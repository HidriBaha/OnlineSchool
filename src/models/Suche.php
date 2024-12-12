<?php

namespace models;
require_once '../db-utils/db-setup.php';

function get_SearchResult($suchbegriff): array{
    global $conn;
    $suchbegriff = "%{". strtolower($suchbegriff). "}%";


    $queries = [
        'faecher' => "SELECT name FROM faecher WHERE lower(name) LIKE ?",
        'thema' => "SELECT * FROM thema WHERE lower(name) LIKE ?",
        'kurse' => "SELECT * FROM kurse WHERE lower(titel) LIKE ? OR lower(author) LIKE ? OR lower(beschreibung) LIKE ?",
        'kapitel' => "SELECT * FROM kapitel WHERE lower(definition) LIKE ?",
        'erklaerungen' => "SELECT * FROM erklaerungen WHERE lower(header) LIKE ? OR lower(erklaerung) LIKE ?"
    ];

    foreach ($queries as $table => $query) {
        $stmt = $conn->prepare($query);

        $paramCount = substr_count($query, "?");

        $types = str_repeat("s", $paramCount);
        $params = array_fill(0, $paramCount, $suchbegriff);

        $stmt->bind_param($types, ...$params);

        if ($table === 'kurse') {
            $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        } elseif ($table === 'erklaerungen') {
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
        } else {
            $stmt->bind_param("s", $searchTerm);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $results[$table] = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }

    return $results;
}
