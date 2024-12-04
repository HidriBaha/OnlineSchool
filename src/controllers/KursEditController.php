<?php

use models\Kapitel;
use models\Kurs;

require_once "../models/Kurs.php";
require_once "../models/Kapitel.php";
require_once "../db-utils/db-setup.php";

function loadKurs(mixed $kursID): Kurs
{
    global $conn;
    $sql = "SELECT * FROM KURSE WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $kursID);
    $stmt->execute();
    $result = $stmt->get_result();
    $kurs = getKursFromResult($result);
    $kurs->setKapitel(getKapitelByKursID($kursID, $conn));

}

function getKapitelByKursID($kursID, $conn): array
{
    $sql = "SELECT * FROM KAPITEL K 
    JOIN ERKLAERUNGEN E ON K.KURS_ID = E.KURS_ID AND K.KAPITEL_NR =E.KAPITEL_NR 
    JOIN AUFGABEN A ON K.KURS_ID =A.KURS_ID AND K.KAPITEL_NR =A.KAPITEL_NR WHERE K.KURS_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $kursID);
    $stmt->execute();
    $result = $stmt->get_result();
    $kapitel = getKapitelFromResult($result);

}

function getKapitelFromResult($result): array
{
    $kapitel = [];
    while ($row = $result->fetch_assoc()) {
        var_dump($row);
        $kapitel = new Kapitel($row['KURS_ID'], $row['KAPITEL_NR'], $row['DEFINITION']);
        $erklaerung = new Er
            array_push($kapitel);
    }
}

function getKursFromResult($result): Kurs
{
    $row = $result->fetch_assoc();
    return new Kurs($row['ID'], $row['KURS_NR'], $row['TITEL'], $row['AUTHOR'], $row['IMG'], $row['BESCHREIBUNG'], $row['THEMA_ID']);
}

class KursEditController
{
    public function kursEdit()
    {
        session_start();
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
        $kapitelNr = $_GET["kapitelNr"] ?? 0;
        $kurs = loadKurs($kursID);
        $vars = ["kurs" => $kurs, $kapitelNr];
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