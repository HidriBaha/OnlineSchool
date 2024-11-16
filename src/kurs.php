<?php
global $kurs;
$id = $_GET["kursID"] ?? 0;
$kurse = [
    [
        "titel"=> "Geometrie I",
        "author" => "user",
        "beschreibung" => "Das ist der erste Kurs",
        "kapitel" => [
            [
                "definition" => "Das ist ein Definition",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung die Zweite",
                        "erklaerung" => "Berechen sie die Nst",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "welche schnittpunkte hat die Gerade",
                        "tipp" => "Nst berechen",
                        "img-src" => "",
                        "loesungen" => [0, 1]
                    ]
                ]
            ],
            [
                "definition" => "Noch eine Definition",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung die Zweite",
                        "erklaerung" => "Berechen sie die Nst",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "welche schnittpunkte hat die Gerade",
                        "tipp" => "Nst berechen",
                        "img-src" => "",
                        "loesungen" => [0, 1]
                    ]
                ]
            ],
        ],
    ],
    [
        "titel"=> "Zahlenmenge",
        "author" => "user",
        "beschreibung" => "das ist ein Kurs",
        "kapitel" => [
            [
                "definition" => "Das ist ein Definition",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung die Zweite",
                        "erklaerung" => "Berechen sie die Nst",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "welche schnittpunkte hat die Gerade",
                        "tipp" => "Nst berechen",
                        "img-src" => "",
                        "loesungen" => [0, 1]
                    ]
                ]
            ],
            [
                "definition" => "Noch eine Definition",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung die Zweite",
                        "erklaerung" => "Berechen sie die Nst",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "welche schnittpunkte hat die Gerade",
                        "tipp" => "Nst berechen",
                        "img-src" => "",
                        "loesungen" => [0, 1]
                    ]
                ]
            ],
        ]
    ],
    [
        "titel"=> "Rechengesetze",
        "author" => "user",
        "beschreibung" => "das ist ein Kurs",
        "kapitel" => [
            [
                "definition" => "Das ist ein Definition",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung die Zweite",
                        "erklaerung" => "Berechen sie die Nst",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "welche schnittpunkte hat die Gerade",
                        "tipp" => "Nst berechen",
                        "img-src" => "",
                        "loesungen" => [0, 1]
                    ]
                ]
            ],
            [
                "definition" => "Noch eine Definition",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung die Zweite",
                        "erklaerung" => "Berechen sie die Nst",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "welche schnittpunkte hat die Gerade",
                        "tipp" => "Nst berechen",
                        "img-src" => "",
                        "loesungen" => [0, 1]
                    ]
                ]
            ],
        ]
    ]

];


$kurs = $kurse[$id];