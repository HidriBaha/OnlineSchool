<?php

use model\Faecher;
use model\Kurs;

include "../db-utils/db-setup.php";
global $conn;

function getFaecher($conn): array
{
    $faecher = [];
    $sql = "SELECT * FROM FAECHER";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($faecher, new Faecher($row['id'], $row['name']));

    }
    return $faecher;
}

function getKurseOverviewByFachId($conn, $fachId): array
{
    $kurse = [];
    $sql = "SELECT * FROM KURSE WHERE FAECHER_ID = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$fachId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($kurse, new Kurs($row['id'], $row['name'], $row['beschreibung']));
    }
    return $kurse;
}

function getKurseOverviewByFachIdThemaId($conn, $fachId, $themaId): array
{
    $kurse = [];
    $sql = "SELECT * FROM KURSE WHERE FAECHER_ID = ? AND THEMA_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$fachId,$themaId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($kurse, new Kurs($row['id'], $row['name'], $row['beschreibung']));
    }
    return $kurse;
}

function getKapitelByKursId($conn, $kursID, $kapitel): array
{
    $kurse = [];
    $sql = "SELECT * FROM KURSE WHERE FAECHER_ID = ? AND THEMA_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$fachId,$themaId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc() != null) {
        array_push($kurse, new Kurs($row['id'], $row['name'], $row['beschreibung']));
    }
    return $kurse;
}


