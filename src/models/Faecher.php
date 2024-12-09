<?php

namespace models;
require_once '../db-utils/db-setup.php';

class Faecher
{
    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;

    }
}

function get_Faecher(): array {
    global $conn;

    if (!$conn) {
        throw new Exception("Datenbankverbindung nicht verfügbar");
    }

    $result = $conn->query("SELECT name FROM faecher");

    if (!$result) {
        throw new Exception("Datenbankabfrage fehlgeschlagen: " . $conn->error);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}