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
        if (!isset($requestData->query["kursID"])) {
            //TODO errorhandling
            return view('kursedit.kursedit-lehrer', ["kurs" => []]);
        }
        $kursID = (int)($requestData->query["kursID"]);
        $kurs = loadKurs($kursID);
        $vars = ["kurs" => $kurs];
        return view('kursedit.kursedit-lehrer', $vars);
    }

}