<?php
require_once "../kurs.php";

class KursEditController
{
    public function kursEdit()
    {
        session_start();
        $role = ($_SESSION['role']) ?? "schüler";
        if ($role == "lehrer" || $role == "admin") {
            return $this->kursEditLeher();
        } else {
            return $this->kursEditLeher();
            return $this->kursEditSchueler();
        }
    }

    public function kursEditSchueler()
    {
        global $kurse;
        $thema = $_GET[THEMA] ?? "geometrie";
        $kursID = $_GET[KURS_ID] ?? "0";
        $kapitelID = $_GET["kapitel"] ?? 0;
        $kurs = $kurse[$thema][$kursID];
        if ($kapitelID >= count($kurs["kapitel"])) {
            $kapitelID = 0;
        }
        $kapitel = $kurs["kapitel"][$kapitelID];
        $vars = ["kapitel" => $kapitel, "kursBeschreibung" => $kurs['beschreibung'], 'kursID' => $kursID, "thema" => $thema];
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