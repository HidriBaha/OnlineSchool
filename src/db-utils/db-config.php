<?php
include 'envloader.php'; // Adjust the path as needed
loadEnv('../.env');

global $dbHost;
global $dbUsername;
global $dbPasswort;
global $dbName;

const DB_HOST = "DB_HOST";
const DB_USERNAME = "DB_USERNAME";
const DB_PASSWORD = "DB_PASSWORD";
const DB_NAME = "DB_NAME";

$dbHost = $_ENV[DB_HOST] ?? "localhost";
$dbUsername = $_ENV[DB_USERNAME] ?? "root";
$dbPasswort = $_ENV[DB_PASSWORD] ?? "123";
$dbName = $_ENV[DB_NAME] ?? "schuldb";

