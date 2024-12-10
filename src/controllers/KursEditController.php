<?php
require_once "../models/Kurs.php";

use models\Kurs;
use function models\loadKurs;

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
        global $kurse;
        $thema = $_GET[THEMA] ?? "geometrie";
        $kursID = $_GET[KURS_ID] ?? "0";
        $kurs = $kurse[$thema][$kursID];
        $vars = ["kurs" => $kurs];
        return view('kursedit.kursedit-lehrer', $vars);
    }

}