<?php
namespace models;

function getKursmitglieder(int $kurs_id): array{
    global $conn;

    $sql = "SELECT user_email FROM kursmitglieder WHERE kurs_id = $kurs_id";
    $result = $conn->query($sql);
    return $result->fetch_all();
}
