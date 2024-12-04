<?php
include "../config/db.php";
global $dbHost, $dbUsername, $dbPasswort, $dbName, $conn, $link;

// Verbindung zur Datenbank herstellen
$conn = new mysqli($dbHost, $dbUsername, $dbPasswort, $dbName);

// Verbindungsfehler prüfen
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}
