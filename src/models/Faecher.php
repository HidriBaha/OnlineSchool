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

    $result = $conn->query("SELECT name, id FROM faecher");

    return $result->fetch_all(MYSQLI_ASSOC);
}
