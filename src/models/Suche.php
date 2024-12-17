<?php

namespace models;

function get_SearchResult($suchbegriff): array{
    $conn = connectdb();
    $suchbegriff = "%". strtolower($suchbegriff). "%";


    $queries = [
        'faecher' => "SELECT DISTINCT name AS fach FROM faecher WHERE lower(name) LIKE ?",
        'thema' => "SELECT DISTINCT t.name AS thema, f.name AS fach FROM thema t LEFT JOIN faecher f on t.faecher_id = f.id WHERE lower(t.name) LIKE ?",

        'kurse' => "SELECT DISTINCT k.beschreibung, k.titel AS kurs, k.id, t.name AS thema FROM kurse k
                                    LEFT JOIN thema t ON t.id = k.thema_id
                                        WHERE lower(k.titel) LIKE ? OR lower(k.author) LIKE ? OR lower(k.beschreibung) LIKE ?",

        'kapitel' => "SELECT DISTINCT kurs.id, kap.kapitel_nr, t.name as thema, e.header, e.erklaerung, kurs.titel as kurs FROM erklaerungen e 
                                        LEFT JOIN kurse kurs ON e.KURS_ID = kurs.id
                                            LEFT JOIN kapitel kap ON e.KAPITEL_NR = kap.KAPITEL_NR
                                                LEFT JOIN thema t ON kurs.THEMA_ID = t.ID
                                                    LEFT JOIN aufgaben a ON a.KURS_ID = kurs.id AND a.KAPITEL_NR = kap.KAPITEL_NR
                                                        WHERE lower(header) LIKE ? OR lower(erklaerung) LIKE ? OR lower(kap.definition) LIKE ? OR a.AUFGABENSTELLUNG LIKE ? OR a.TIPP LIKE ?"
    ];

    $results = [];

    foreach ($queries as $table => $query) {
        $stmt = $conn->prepare($query);

        $paramCount = substr_count($query, "?");

        $types = str_repeat("s", $paramCount);
        $params = array_fill(0, $paramCount, $suchbegriff);

        $stmt->bind_param($types, ...$params);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $results[$table] = $result->fetch_all(MYSQLI_ASSOC);
        }
        $stmt->close();
    }

    return $results;
}
