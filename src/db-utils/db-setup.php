<?php
include "db-config.php";
global $dbHost;
global $dbUsername;
global $dbPasswort;
global $dbName;
global $conn;

echo "DB ENV:".$dbHost, $dbUsername, $dbPasswort, $dbName;
// Verbindung zur Datenbank herstellen
$conn = new mysqli($dbHost, $dbUsername, $dbPasswort, $dbName);

// Verbindungsfehler prüfen
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}
