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


        $userID=$_SESSION["userID"];
        $conn = connectdb();
        $query = "SELECT aufgabe_id FROM user_completed_tasks WHERE user_id = $userID";
        $result = mysqli_query($conn, $query);
        $completedTasks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $completedTasks[] = $row['aufgabe_id'];
        }
        $vars = ["kurs" => $kurs, "kapitelNr" => $kapitelNr,"completedTasks" => $completedTasks,];
        return view('kursedit.kursedit-schueler', $vars);
    }
// In KursEditController.php

    public function markTaskCompleted()
    {
        // Establish a database connection
        $conn = connectdb();

        // Get JSON input from the AJAX request
        $data = json_decode(file_get_contents('php://input'), true);

        // Validate the incoming data
        if (!isset($data['aufgabe_id']) || !isset($_SESSION['userID'])) {
            echo json_encode(['success' => false, 'error' => 'Invalid request']);
            return;
        }

        $aufgabeId = (int)$data['aufgabe_id'];
        $userId = (int)$_SESSION['userID']; // Assume user ID is stored in session

        // Insert task completion into the database
        $query = "INSERT IGNORE INTO user_completed_tasks (user_id, aufgabe_id) VALUES ($userId, $aufgabeId)";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_affected_rows($conn) > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update the database']);
        }



    // Insert task completion into the database
        $query = "INSERT IGNORE INTO user_completed_tasks (user_id, aufgabe_id) VALUES ($userId, $aufgabeId)";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_affected_rows($conn) > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update the database']);
        }
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
        $target_dir = "../public/img/aufgaben/";
        $allowedImgType = ["png", "jpeg"];

        $body = $requestData->query;
        $kursID = (int)$body["kursID"];
        $keys = array_keys($body);
        foreach ($keys as $key) {
            if (str_starts_with($key, "kapitel-definition-")) {
                $args = str_replace("kapitel-definition-", "", $key);
                $args = explode("-", $args);
                $kapitelNr = $args[0];
                if (str_ends_with($key, "-new")) {
                    insertKapitel($kursID, $kapitelNr, $body[$key]);
                } else {
                    updateKapitel($kursID, $kapitelNr, $body[$key]);
                }
                //echo $key . $post[$key];
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
            } else if (count(($fileKeys = array_keys($_FILES))) > 0) {
                foreach ($fileKeys as $fileKey) {
                    $args = str_replace("aufgabenImg-", "", $fileKey);
                    $args = explode("-", $args);
                    echo $fileKey;
                    $kapitelNr = $args[0];
                    $aufgabenNr = $args[1];
                    var_dump($_FILES[$fileKey]);
                    $path = $target_dir . "/kurs-" . $kursID . "/kapitel-" . $kapitelNr . "/aufgabe-" . $aufgabenNr . "/";
                    $target_file = $path . htmlspecialchars(basename($_FILES[$fileKey]["name"]));
                    echo $target_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (array_search($imageFileType, $allowedImgType)===false) {
                        return;
                    }
                    $check = getimagesize($_FILES[$fileKey]["tmp_name"]);
                    if ($check === false) {
                        return;
                    }
                    if(file_exists($target_file)){
                        return;
                    }
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    if (!move_uploaded_file($_FILES[$fileKey]["tmp_name"], $target_file)) {
                       echo "the Upload didnt work";
                    }
                    echo "File is an image - " . $check["mime"] . ".";
                    //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    // echo $_FILES["fileToUpload"][$key];
                }
            } else {
                var_dump($_FILES);

                echo $key;
            }

            //echo $key . "    -    ";
        }
    }
}
