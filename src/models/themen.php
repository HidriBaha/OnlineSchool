<?php

namespace models;
function get_Themen(string $id): array{
    global $conn;

    $result = $conn->query("SELECT name FROM thema WHERE faecher_id = ". $id. ";");

    return $result->fetch_all(MYSQLI_ASSOC);
}
