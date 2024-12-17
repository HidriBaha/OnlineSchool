<?php
include_once '../db-utils/envloader.php';
loadEnv('../.env');

$dbHost = $_ENV["DB_HOST"] ?? "localhost";
$dbUsername = $_ENV["DB_USERNAME"] ?? "root";
$dbPasswort = $_ENV["DB_PASSWORD"] ?? "123";
$dbName = $_ENV["DB_NAME"] ?? "schuldb";

return [
    'host' => $dbHost,
    'user' => $dbUsername,
    'password' => $dbPasswort,
    'database' => $dbName,
];

