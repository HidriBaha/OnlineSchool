<?php
require_once "../models/Kurs.php";

use models\Kurs;
use function models\insertAufgabenAufgabenstellung;
use function models\insertErklaerungHeader;
use function models\insertKapitel;
use function models\insertLoesung;
use function models\loadKurs;
use function models\updateAufgabenAufgabenstellung;
use function models\updateErklaerung;
use function models\updateErklaerungHeader;
use function models\updateKapitel;
use function models\updateLoesung;

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
        $kursID = (int)($requestData->query["kursID"]);
        $kurs = loadKurs($kursID);
        $vars = ["kurs" => $kurs];
        return view('kursedit.kursedit-lehrer', $vars);
    }

    public function kursUpdate(RequestData $requestData)
    {
        $post = $requestData->getPostData();
        $kursID = (int)$post["kursID"];
        $keys = array_keys($post);
        foreach ($keys as $key) {
            if (str_starts_with($key, "kapitel-definition-")) {
                $args = str_replace("kapitel-definition-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                if (str_ends_with($key, "-new")) {
                    insertKapitel($kursID, $kapitelNr, $post[$key]);
                } else {
                    updateKapitel($kursID, $kapitelNr, $post[$key]);
                }
                //echo $key . $post[$key];
            } else if (str_starts_with($key, "erklaerung-header-")) {
                $args = str_replace("erklaerung-header-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $erklaerungNr = $args[1];
                if (str_ends_with($key, "-new")) {
                    insertErklaerungHeader($kursID, $kapitelNr, $erklaerungNr, $post[$key]);
                } else {
                    updateErklaerungHeader($kursID, $kapitelNr, $erklaerungNr, $post[$key]);
                }
            } else if (str_starts_with($key, "erklaerung-")) {
                $args = str_replace("erklaerung-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $erklaerungNr = $args[1];
                updateErklaerung($kursID, $kapitelNr, $erklaerungNr, $post[$key]);
            } else if (str_starts_with($key, "aufgaben-")) {
                $args = str_replace("aufgaben-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                $aufgabenNr = $args[1];
                if (str_ends_with($key, "-new")) {
                    insertAufgabenAufgabenstellung($kursID, $kapitelNr, $aufgabenNr, $post[$key]);
                } else {
                    updateAufgabenAufgabenstellung($kursID, $kapitelNr, $aufgabenNr, $post[$key]);
                }
            }else if(str_starts_with($key,"loesung-")){
                $args = str_replace("loesung-","",$key);
                $args = explode("-",$args);
                $kapitelNr = $args[0];
                $aufgabenNr = $args[1];
                if(str_ends_with($key,"-new")){
                    insertLoesung();
                }else{
                    $loesungsID = $args[2];
                    updateLoesung($loesungsID,$post[$key]);
                }
            }
            echo $key . "    -    ";
        }
    }
}
