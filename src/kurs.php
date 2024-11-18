<?php
global $kurs;
$id = $_GET["kursID"] ?? 0;
$kurse = [
    [
        "titel" => "Geometrie I",
        "author" => "user",
        "beschreibung" => "Das ist der erste Kurs",
        "kapitel" => [
            [
                "definition" => "Grundbegriffe der Geometrie: Punkt, Linie, Ebene",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung zur Definition von Punkten und Linien",
                        "erklaerung" => "Ein Punkt hat keine Ausdehnung und dient als Position. Eine Linie ist eine gerade, unendlich lange Verbindung von Punkten.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Zeichne zwei Punkte A (2, 3) und B (6, 3) und verbinde sie mit einer Linie.",
                        "tipp" => "Nutze ein Lineal, um die Linie gerade zu ziehen.",
                        "img-src" => "",
                        "loesungen" => []
                    ]
                ]
            ],
            [
                "definition" => "Winkel und deren Messung",
                "erklaerungen" => [
                    [
                        "header" => "Erklärung zu Winkeln",
                        "erklaerung" => "Ein Winkel wird durch zwei Linien definiert, die sich in einem Punkt schneiden. Der Abstand zwischen diesen Linien wird in Grad gemessen.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Zeichne zwei Linien, die sich im Punkt O (0, 0) schneiden. Wähle auf der ersten Linie die Punkte A (4, 0) und B (-4, 0). Auf der zweiten Linie wähle die Punkte C (0, 5) und D (0, -5). Miss den Winkel ∠AOC mit einem Geodreieck.",
                        "tipp" => "Achte darauf, das Geodreieck genau am Punkt O (0, 0) auszurichten und die Linien präzise zu zeichnen.",
                        "img-src" => "",
                        "loesungen" => [90]
                    ]
                ]
            ]
        ]
    ],
    [
        "titel" => "Zahlenmengen",
        "author" => "user",
        "beschreibung" => "Ein Kurs über die verschiedenen Zahlenmengen und ihre Eigenschaften.",
        "kapitel" => [
            [
                "definition" => "Die Menge der natürlichen Zahlen (ℕ)",
                "erklaerungen" => [
                    [
                        "header" => "Definition natürlicher Zahlen",
                        "erklaerung" => "Die natürlichen Zahlen (ℕ) umfassen alle positiven ganzen Zahlen, beginnend bei 1. Manche Definitionen schließen die 0 mit ein: ℕ = {1, 2, 3, ...} oder ℕ₀ = {0, 1, 2, ...}.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Schreibe die ersten fünf natürlichen Zahlen auf.",
                        "tipp" => "Denke daran, dass sie bei 1 beginnen.",
                        "img-src" => "",
                        "loesungen" => [1, 2, 3, 4, 5]
                    ],
                    [
                        "aufgabenstellung" => "Welche Zahl ist die kleinste natürliche Zahl?",
                        "tipp" => "Überlege, ob die Null dazugehört.",
                        "img-src" => "",
                        "loesungen" => [1] // oder 0, wenn ℕ₀ definiert ist
                    ]
                ]
            ],
            [
                "definition" => "Die Menge der ganzen Zahlen (ℤ)",
                "erklaerungen" => [
                    [
                        "header" => "Definition ganzer Zahlen",
                        "erklaerung" => "Die ganzen Zahlen (ℤ) umfassen die natürlichen Zahlen, ihre negativen Gegenzahlen und die Null: ℤ = {..., -3, -2, -1, 0, 1, 2, 3, ...}.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Gib fünf aufeinanderfolgende ganze Zahlen an, die sowohl positive als auch negative Zahlen enthalten.",
                        "tipp" => "Beginne bei -2.",
                        "img-src" => "",
                        "loesungen" => [-2, -1, 0, 1, 2]
                    ],
                    [
                        "aufgabenstellung" => "Ist die Zahl -7 eine natürliche Zahl oder eine ganze Zahl?",
                        "tipp" => "Denke an die Definition der natürlichen Zahlen.",
                        "img-src" => "",
                        "loesungen" => ["ganze Zahl"]
                    ]
                ]
            ],
            [
                "definition" => "Die Menge der rationalen Zahlen (ℚ)",
                "erklaerungen" => [
                    [
                        "header" => "Definition rationaler Zahlen",
                        "erklaerung" => "Rationale Zahlen (ℚ) sind alle Zahlen, die als Bruch geschrieben werden können, wobei der Zähler und der Nenner ganze Zahlen sind und der Nenner nicht null ist: ℚ = {p/q | p, q ∈ ℤ, q ≠ 0}.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Schreibe drei Beispiele für rationale Zahlen auf.",
                        "tipp" => "Denke an Brüche wie 1/2 oder 3/4.",
                        "img-src" => "",
                        "loesungen" => ["1/2", "3/4", "-5/2"]
                    ],
                    [
                        "aufgabenstellung" => "Ist die Zahl 0.75 eine rationale Zahl?",
                        "tipp" => "Überlege, ob sie als Bruch dargestellt werden kann.",
                        "img-src" => "",
                        "loesungen" => ["Ja"]
                    ]
                ]
            ]
        ]
    ],
    [
        "titel" => "Rechengesetze",
        "author" => "user",
        "beschreibung" => "Ein Kurs über grundlegende Rechengesetze wie das Kommutativ-, Assoziativ- und Distributivgesetz.",
        "kapitel" => [
            [
                "definition" => "Kommutativgesetz",
                "erklaerungen" => [
                    [
                        "header" => "Was besagt das Kommutativgesetz?",
                        "erklaerung" => "Das Kommutativgesetz besagt, dass die Reihenfolge der Operanden bei Addition und Multiplikation vertauscht werden kann, ohne das Ergebnis zu ändern: a + b = b + a und a × b = b × a.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Überprüfe das Kommutativgesetz für die Addition: Berechne 3 + 5 und 5 + 3.",
                        "tipp" => "Addiere die Zahlen und vergleiche die Ergebnisse.",
                        "img-src" => "",
                        "loesungen" => [8, 8]
                    ],
                    [
                        "aufgabenstellung" => "Überprüfe das Kommutativgesetz für die Multiplikation: Berechne 4 × 7 und 7 × 4.",
                        "tipp" => "Multipliziere die Zahlen in beiden Reihenfolgen.",
                        "img-src" => "",
                        "loesungen" => [28, 28]
                    ]
                ]
            ],
            [
                "definition" => "Assoziativgesetz",
                "erklaerungen" => [
                    [
                        "header" => "Was besagt das Assoziativgesetz?",
                        "erklaerung" => "Das Assoziativgesetz besagt, dass bei Addition und Multiplikation die Klammerung der Operanden keine Rolle spielt: (a + b) + c = a + (b + c) und (a × b) × c = a × (b × c).",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Überprüfe das Assoziativgesetz für die Addition: Berechne (2 + 3) + 4 und 2 + (3 + 4).",
                        "tipp" => "Berechne zuerst den Inhalt der Klammern und addiere dann weiter.",
                        "img-src" => "",
                        "loesungen" => [9, 9]
                    ],
                    [
                        "aufgabenstellung" => "Überprüfe das Assoziativgesetz für die Multiplikation: Berechne (2 × 3) × 4 und 2 × (3 × 4).",
                        "tipp" => "Berechne zuerst den Inhalt der Klammern und multipliziere dann weiter.",
                        "img-src" => "",
                        "loesungen" => [24, 24]
                    ]
                ]
            ],
            [
                "definition" => "Distributivgesetz",
                "erklaerungen" => [
                    [
                        "header" => "Was besagt das Distributivgesetz?",
                        "erklaerung" => "Das Distributivgesetz verknüpft Multiplikation mit Addition: a × (b + c) = (a × b) + (a × c). Es zeigt, dass eine Multiplikation über eine Summe 'verteilt' werden kann.",
                        "img-src" => ""
                    ]
                ],
                "aufgaben" => [
                    [
                        "aufgabenstellung" => "Überprüfe das Distributivgesetz: Berechne 3 × (4 + 5) und (3 × 4) + (3 × 5).",
                        "tipp" => "Berechne zunächst die Klammer und multipliziere, dann verteile die Multiplikation auf die Summanden.",
                        "img-src" => "",
                        "loesungen" => [27, 27]
                    ],
                    [
                        "aufgabenstellung" => "Überprüfe das Distributivgesetz: Berechne 2 × (6 + 7) und (2 × 6) + (2 × 7).",
                        "tipp" => "Verteile die Multiplikation auf die Zahlen in der Klammer.",
                        "img-src" => "",
                        "loesungen" => [26, 26]
                    ]
                ]
            ]
        ]
    ]
];


$kurs = $kurse[$id];