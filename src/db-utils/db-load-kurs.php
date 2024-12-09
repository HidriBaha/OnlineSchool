<?php

use models\Faecher;
use models\Kurs;


function getFaecher(): array
{
    $faecher = [];
    $sql = "SELECT * FROM FAECHER";

    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($faecher, new Faecher($row['id'], $row['name']));

    }
    return $faecher;
}

function getKurseOverviewByFachId($fachId): array
{

    $conn = connectdb();
    $kurse = [];
    $sql = "SELECT K.ID, K.KURS_NR, K.TITEL, K.AUTHOR, K.IMG, K.BESCHREIBUNG, K.THEMA_ID FROM FAECHER F JOIN THEMA T ON F.ID =T.FAECHER_ID JOIN KURSE K ON K.THEMA_ID = T.ID WHERE FAECHER_ID = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$fachId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($kurse, createKursFromRow($row));
    }
    return $kurse;
}

function getKurseOverviewByFachIdThemaId($fachId, $themaId): array
{
    $kurse = [];
    $conn = connectdb();
    $sql = "SELECT * FROM KURSE WHERE FAECHER_ID = ? AND THEMA_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$fachId,$themaId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($kurse, createKursFromRow($row));
    }
    return $kurse;
}

function getKapitelByKursId($kursID, $kapitelNr): array
{
    $kurse = [];
    $sql = "SELECT * FROM KURSE WHERE KURS_ID = ? AND KAPITEL_NR = ?";
    $conn = connectdb();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$kursID,$kapitelNr);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($kurse,createKursFromRow($row));
    }
    return $kurse;
}

function createKursFromRow($row):Kurs{
    return new Kurs($row['ID'], $row['KURS_NR'], $row['TITEL'], $row['AUTHOR'], $row['IMG'], $row['BESCHREIBUNG'], $row['THEMA_ID']);
}


