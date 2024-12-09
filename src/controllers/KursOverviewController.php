<?php

use models\Kurs;

require_once "../models/Kurs.php";

class KursOverviewController
{
    public function kursOverview()
    {
        $conn = connectdb();
        $fach = $_GET["fach"] ?? "Mathe";
        //TODO error handling falls kein Fach da ist
        if (isset($_GET["thema"])) {
            $thema = $_GET["thema"];
            $sql = "SELECT T.NAME,K.ID, KURS_NR, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID FROM KURSE k join thema t on k.THEMA_ID = t.ID join FAECHER f on t.FAECHER_ID = f.ID WHERE f.NAME like ? and t.NAME like ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $fach, $thema);
        } else {
            $sql = "SELECT T.NAME, K.ID, KURS_NR, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID FROM KURSE k join thema t on k.THEMA_ID = t.ID join FAECHER f on t.FAECHER_ID = f.ID WHERE f.NAME like ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $fach);
        }
        $stmt->execute();
        $results = $stmt->get_result();
        $kurse = $this->getKursFromResult($results);
        $vars = ["kurse" => $kurse];
        return view('kursoverview.kursoverview', $vars);
    }

    function getKursFromResult($results): array
    {
        $kurse = [];
        while ($row = $results->fetch_assoc()) {
            $thema = $row["NAME"];
            if (!isset($kurse[$thema])) {
                $kurse[$thema] = [];
            }
            $kurs = new Kurs($row['ID'], $row['KURS_NR'], $row['TITEL'], $row['AUTHOR'], $row['IMG'], $row['BESCHREIBUNG'], $row['THEMA_ID']);
            array_push($kurse[$thema], $kurs);
        }
        return $kurse;
    }
}