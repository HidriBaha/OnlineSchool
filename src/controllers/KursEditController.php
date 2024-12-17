<?php
require_once "../models/Kurs.php";
require_once "../models/Faecher.php";
require_once "../models/Thema.php";

use models\Kurs;
use function models\createKurs;
use function models\insertAufgabenAufgabenstellung;
use function models\insertErklaerungHeader;
use function models\insertKapitel;
use function models\insertLoesung;
use function models\loadFachByName;
use function models\loadFacher;
use function models\loadKurs;
use function models\loadThemaByName;
use function models\loadThemen;
use function models\updateAufgabeImgSrc;
use function models\updateAufgabenAufgabenstellung;
use function models\updateErklaerung;
use function models\updateErklaerungHeader;
use function models\updateErklaerungImgSrc;
use function models\updateKapitel;
use function models\updateKursThemaId;
use function models\updateLoesung;
use function models\updateThema;
use function models\updateTitle;

class KursEditController
{
    public function kursEdit(RequestData $requestData)
    {
        $role = ($_SESSION['role']) ?? "schüler";
        if ($role == "lehrer" || $role == "admin") {
            return $this->kursEditLeher($requestData);
        } else {
            return $this->kursEditSchueler($requestData);
        }
    }

    public function kursEditSchueler(RequestData $requestData)
    {
        if (!isset($requestData->query["kursID"])) {
            //TODO errorhandling
            return view('kursedit.kursedit-schueler', ["kurs" => []]);
        }
        $kursID = (int)($requestData->query["kursID"]);
        $kapitelNr = (int)($requestData->query["kapitelNr"] ?? 1);
        $kurs = loadKurs($kursID);
        $vars = ["kurs" => $kurs, "kapitelNr" => $kapitelNr];
        return view('kursedit.kursedit-schueler', $vars);
    }


    public function kursEditLeher(RequestData $requestData)
    {
        if (!isset($requestData->query["kursID"])) {
            //TODO errorhandling
            return view('kursedit.kursedit-lehrer', ["kurs" => []]);
        }

        $vars = "";
        $faecher = loadFacher();
        $themen = loadThemen();

        if (isset($requestData->query["kursID"]) && is_numeric($requestData->query["kursID"])) {
            $kursID = (int)($requestData->query["kursID"]);
            $kurs = loadKurs($kursID);
            $vars = ["kurs" => $kurs, "faecher" => $faecher, "themen" => $themen];
        } else if (isset($requestData->query["kursID"]) && $requestData->query["kursID"] == "new") {
            $fachName = $requestData->query["fach"];
            $themaName = $requestData->query["thema"];
            $fach = loadFachByName($fachName);
            $thema = loadThemaByName($themaName);
            $vars = ["fach" => $fach, "thema" => $thema, "faecher" => $faecher, "themen" => $themen];
        }
        return view('kursedit.kursedit-lehrer', $vars);
    }

    public function kursUpdate(RequestData $requestData)
    {
        $target_dir = "../public/img/";

        $body = $requestData->query;

        $kursID = 0;
        if ($body["kursID"] == "new"){
            $userId = $_SESSION["userId"];
            $kursID = createKurs($userId);
        }else {
            $kursID = (int)$body["kursID"];
        }
        $keys = array_keys($body);
        $fach = "";
        $thema = "";
        foreach ($keys as $key) {
            if ($key == "fach") {
                $fach = $body[$key];
            } else if ($key == "thema") {
                $thema = $body[$key];
                updateThema($kursID,$thema);
            }else if($key == "title"){
                updateTitle($kursID,$body[$key]);
            } else if (str_starts_with($key, "kapitel-definition-")) {
                $args = str_replace("kapitel-definition-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                if (str_ends_with($key, "-new")) {
                    insertKapitel($kursID, $kapitelNr, $body[$key]);
                } else {
                    updateKapitel($kursID, $kapitelNr, $body[$key]);
                }
            } else if (str_starts_with($key, "erklaerung-header-")) {
                $args = str_replace("erklaerung-header-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $erklaerungNr = $args[1];
                if (str_ends_with($key, "-new")) {
                    insertErklaerungHeader($kursID, $kapitelNr, $erklaerungNr, $body[$key]);
                } else {
                    updateErklaerungHeader($kursID, $kapitelNr, $erklaerungNr, $body[$key]);
                }
            } else if (str_starts_with($key, "erklaerung-")) {
                $args = str_replace("erklaerung-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $erklaerungNr = $args[1];
                updateErklaerung($kursID, $kapitelNr, $erklaerungNr, $body[$key]);
            } else if (str_starts_with($key, "aufgaben-")) {
                $args = str_replace("aufgaben-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $aufgabenNr = $args[1];
                if (str_ends_with($key, "-new")) {
                    insertAufgabenAufgabenstellung($kursID, $kapitelNr, $aufgabenNr, $body[$key]);
                } else {
                    updateAufgabenAufgabenstellung($kursID, $kapitelNr, $aufgabenNr, $body[$key]);
                }
            } else if (str_starts_with($key, "loesung-")) {
                $args = str_replace("loesung-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $aufgabenNr = $args[1];
                if (str_ends_with($key, "-new")) {
                    insertLoesung($kursID, $kapitelNr, $aufgabenNr, $body[$key]);
                } else {
                    $loesungsID = $args[2];
                    updateLoesung($loesungsID, $body[$key]);
                }
            } else if (str_starts_with($key, "selectedThema")) {
                $themaId = $body[$key];
                updateKursThemaId($kursID, $themaId);
            } else if (count(($fileKeys = array_keys($_FILES))) > 0) {
                foreach ($fileKeys as $fileKey) {
                    if (empty($_FILES[$fileKey]["tmp_name"])) {
                        continue;
                    }
                    $check = getimagesize($_FILES[$fileKey]["tmp_name"]);
                    if ($check === false) {
                        return;
                    }
                    if (str_starts_with($fileKey, "aufgabenImg-")) {
                        $args = str_replace("aufgabenImg-", "", $fileKey);
                        $args = explode("-", $args);
                        $kapitelNr = $args[0];
                        $aufgabenNr = $args[1];
                        $path = $target_dir . "aufgaben/kurs-" . $kursID . "/kapitel-" . $kapitelNr . "/aufgabe-" . $aufgabenNr . "/";
                        $dbPath = "/img/aufgaben/kurs-" . $kursID . "/kapitel-" . $kapitelNr . "/aufgabe-" . $aufgabenNr . "/";
                        $imgSrc = $dbPath . htmlspecialchars(basename($_FILES[$fileKey]["name"]));
                        $this->checkAndCreateFile($fileKey, $path);
                        updateAufgabeImgSrc($kursID, $kapitelNr, $aufgabenNr, $imgSrc);
                    } else if (str_starts_with($fileKey, "erklaerungImg-")) {
                        $args = str_replace("erklaerungImg-", "", $fileKey);
                        $args = explode("-", $args);
                        $kapitelNr = $args[0];
                        $path = $target_dir . "erklaerung/kurs-" . $kursID . "/kapitel-" . $kapitelNr . "/";
                        $dbPath = "/img/erklaerung/kurs-" . $kursID . "/kapitel-" . $kapitelNr . "/";
                        $this->checkAndCreateFile($fileKey, $path);
                        $imgSrc = $dbPath . htmlspecialchars(basename($_FILES[$fileKey]["name"]));
                        updateErklaerungImgSrc($kursID, $kapitelNr, 1, $imgSrc);
                    }
                }
            }
        }
        header('Location: ' . "/kurs-overview?fach=" . $fach . "&thema=" . $thema);
    }

    private function checkAndCreateFile($fileKey, $path)
    {
        $allowedImgType = ["png", "jpeg"];
        $target_file = $path . htmlspecialchars(basename($_FILES[$fileKey]["name"]));
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $allowedImgType)) {
            return;
        }
        if (file_exists($target_file)) {
            return;
        }
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (!move_uploaded_file($_FILES[$fileKey]["tmp_name"], $target_file)) {
            echo "the Upload didnt work";
        }
    }
}
