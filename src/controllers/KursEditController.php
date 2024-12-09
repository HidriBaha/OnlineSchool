<?php
require_once "../models/Kurs.php";

use models\Kurs;
use function models\loadKurs;

class KursEditController
{
    public function kursEdit()
    {
        $role = ($_SESSION['role']) ?? "schüler";
        if ($role == "lehrer" || $role == "admin") {
            return $this->kursEditLeher();
        } else {
            return $this->kursEditSchueler();
        }
    }

    public function kursEditSchueler()
    {
        if (!isset($_GET["kursID"])) {
            //TODO errorhandling
            return view('kursedit.kursedit-schueler', ["kurs" => []]);
        }
        $kursID = $_GET["kursID"];
        $kapitelNr = $_GET["kapitelNr"] ?? 1;
        $kurs = loadKurs($kursID);
        $thema = "Geometrie";//TODO
        $fach="Mathe"; //TODO
        $vars = ["kurs" => $kurs, "kapitelNr"=>$kapitelNr,"thema"=>$thema,"fach"=>$fach];
        return view('kursedit.kursedit-schueler', $vars);
    }


    public function kursEditLeher()
    {
        global $kurse;
        $thema = $_GET[THEMA] ?? "geometrie";
        $kursID = $_GET[KURS_ID] ?? "0";
        $kurs = $kurse[$thema][$kursID];
        $vars = ["kurs" => $kurs];
        return view('kursedit.kursedit-lehrer', $vars);
    }

}