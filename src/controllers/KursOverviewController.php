<?php

use models\Kurs;

require_once "../db-utils/db-setup.php";
require_once "../models/Kurs.php";

class KursOverviewController
{
    public function kursOverview()
    {
        global $conn;
        $fach = $_GET["fach"] ?? "Mathe";
        //TODO error handling falls kein Fach da ist
        if (isset($_GET["thema"])) {
            $thema = $_GET["thema"];
            $sql = "SELECT T.NAME,K.ID, KURS_NR, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID FROM FAECHER F JOIN THEMA T ON F.ID = T.FAECHER_ID JOIN KURSE K ON T.ID = K.ID WHERE F.NAME LIKE ? AND T.NAME LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $fach, $thema);
        } else {
            $sql = "SELECT T.NAME, K.ID, KURS_NR, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID FROM FAECHER F JOIN THEMA T ON F.ID = T.FAECHER_ID JOIN KURSE K ON T.ID = K.ID WHERE F.NAME LIKE ? ";
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