<?php
global $kurs;
global $kurse;
global $kurseThema;
global $kurseTitle;
global $thema;
global $kursID;
const THEMA = "thema";
const KURS_ID = "kursID";
const KAPITEL = "kapitel";

$thema = $_GET[THEMA] ?? "geometrie";
$kursID = $_GET[KURS_ID] ?? "0";

$kurse = [
    "geometrie" => [
        [
            "titel" => "Geometrie I",
            "author" => "user",
            "img" => "../img/quarder.png",
            "beschreibung" => "Eine kurze Erklärung zum Kurs Geometrie I. Dieser Kurs behandelt die Grundlagen der Geometrie, einschließlich Formen, Winkel und Flächen.",
            "kapitel" => [
                [
                    "definition" => "Grundbegriffe der Geometrie: Punkt, Linie, Ebene",
                    "erklaerungen" => [
                        [
                            "header" => "Erklärung zur Definition von Punkten und Linien",
                            "erklaerung" => "Ein Punkt hat keine Ausdehnung und dient als Position. Eine Linie ist eine gerade, unendlich lange Verbindung von Punkten.",
                            "img-src" => "../img/aufgaben/gerade.png"
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
                            "img-src" => "../img/aufgaben/winkel.png",
                            "loesungen" => [90]
                        ]
                    ]
                ]
            ]
        ],
        [
            "titel" => "Geometrie II",
            "author" => "user",
            "img" => "../img/quarder.png",
            "beschreibung" => "Das ist der zweite Kurs",
            "kapitel" => [
                [
                    "definition" => "Transformationen: Translation, Rotation, Spiegelung",
                    "erklaerungen" => [
                        [
                            "header" => "Grundlagen der geometrischen Transformationen",
                            "erklaerung" => "Eine Transformation beschreibt die Bewegung oder Änderung einer Figur im Raum, ohne deren Form zu verändern.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Verschiebe das Dreieck mit den Punkten A (1, 1), B (4, 1) und C (2, 3) um den Vektor (3, 2). Zeichne das resultierende Dreieck.",
                            "tipp" => "Addiere den Vektor (3, 2) zu jedem Punkt des Dreiecks.",
                            "img-src" => "",
                            "loesungen" => [
                                "A' (4, 3)",
                                "B' (7, 3)",
                                "C' (5, 5)"
                            ]
                        ]
                    ]
                ],
                [
                    "definition" => "Symmetrie und Kongruenz",
                    "erklaerungen" => [
                        [
                            "header" => "Was sind symmetrische Figuren?",
                            "erklaerung" => "Eine Figur ist symmetrisch, wenn sie durch eine Spiegelung an einer Linie oder einer Rotation um einen Punkt auf sich selbst abgebildet werden kann.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Zeichne ein Quadrat mit den Eckpunkten A (0, 0), B (4, 0), C (4, 4), und D (0, 4). Spiegele das Quadrat an der Linie x = 2.",
                            "tipp" => "Finde zuerst die Spiegelpunkte, indem du den Abstand zur Spiegelachse berechnest.",
                            "img-src" => "",
                            "loesungen" => [
                                "A' (4, 0)",
                                "B' (0, 0)",
                                "C' (0, 4)",
                                "D' (4, 4)"
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            "titel" => "Geometrie III",
            "author" => "user",
            "img" => "../img/quarder.png",
            "beschreibung" => "Das ist der dritte Kurs",
            "kapitel" => [
                [
                    "definition" => "Vektorgeometrie: Vektoren, Skalare und Operationen",
                    "erklaerungen" => [
                        [
                            "header" => "Einführung in die Vektorrechnung",
                            "erklaerung" => "Ein Vektor repräsentiert eine gerichtete Größe im Raum, definiert durch eine Richtung und eine Länge. Operationen wie Addition und Skalarmultiplikation ermöglichen die Manipulation von Vektoren.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Berechne die Summe der Vektoren a = (2, 3) und b = (-1, 4).",
                            "tipp" => "Addiere die jeweiligen Komponenten der Vektoren.",
                            "img-src" => "",
                            "loesungen" => [
                                "Ergebnis: (1, 7)"
                            ]
                        ]
                    ]
                ],
                [
                    "definition" => "Geraden und Ebenen im Raum",
                    "erklaerungen" => [
                        [
                            "header" => "Parametergleichung einer Geraden",
                            "erklaerung" => "Eine Gerade im Raum wird durch einen Stützpunkt und einen Richtungsvektor definiert. Die Parametergleichung lautet: g: r(t) = p + t * d, wobei p der Stützpunkt und d der Richtungsvektor ist.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Gegeben sei der Punkt P (1, 2, 3) und der Richtungsvektor d = (2, -1, 1). Schreibe die Parametergleichung der Geraden g.",
                            "tipp" => "Verwende die Formel r(t) = p + t * d.",
                            "img-src" => "",
                            "loesungen" => [
                                "r(t) = (1, 2, 3) + t * (2, -1, 1)"
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    "zahlenmenge" => [
        [
            "titel" => "Zahlenmengen I",
            "author" => "user",
            "img" => "../img/zahlenmenge.svg",
            "beschreibung" => "Dieser Kurs behandelt verschiedene Zahlenmengen und ihre Eigenschaften und hilft den Schülern, verschiedene Zahloperationen zu verstehen.",
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
            "titel" => "Zahlenmengen II",
            "author" => "user",
            "img" => "../img/zahlenmenge.svg",
            "beschreibung" => "Ein Kurs über irrationale und reelle Zahlen.",
            "kapitel" => [
                [
                    "definition" => "Die Menge der irrationalen Zahlen",
                    "erklaerungen" => [
                        [
                            "header" => "Definition irrationaler Zahlen",
                            "erklaerung" => "Irrationale Zahlen können nicht als Bruch dargestellt werden. Sie haben unendliche, nicht periodische Dezimaldarstellungen. Beispiele sind √2 und π.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Gib ein Beispiel für eine irrationale Zahl an.",
                            "tipp" => "Denke an Wurzeln oder bekannte Konstanten wie π.",
                            "img-src" => "",
                            "loesungen" => ["√2"]
                        ],
                        [
                            "aufgabenstellung" => "Kann die Zahl 1.414213... als Bruch dargestellt werden?",
                            "tipp" => "Überlege, ob die Dezimaldarstellung periodisch ist.",
                            "img-src" => "",
                            "loesungen" => ["Nein"]
                        ]
                    ]
                ],
                [
                    "definition" => "Die Menge der reellen Zahlen (ℝ)",
                    "erklaerungen" => [
                        [
                            "header" => "Definition reeller Zahlen",
                            "erklaerung" => "Die Menge der reellen Zahlen umfasst alle rationalen und irrationalen Zahlen. Sie kann als die Menge aller Zahlen auf der Zahlengeraden beschrieben werden.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Gib drei Beispiele für reelle Zahlen an.",
                            "tipp" => "Dazu gehören rationale und irrationale Zahlen.",
                            "img-src" => "",
                            "loesungen" => ["1", "√3", "π"]
                        ],
                        [
                            "aufgabenstellung" => "Ist die Zahl -√7 eine reelle Zahl?",
                            "tipp" => "Überlege, ob sie auf der Zahlengeraden liegt.",
                            "img-src" => "",
                            "loesungen" => ["Ja"]
                        ]
                    ]
                ]
            ]
        ],
        [
            "titel" => "Zahlenmengen III",
            "author" => "user",
            "img" => "../img/zahlenmenge.svg",
            "beschreibung" => "Ein Kurs über komplexe und transzendente Zahlen.",
            "kapitel" => [
                [
                    "definition" => "Die Menge der komplexen Zahlen (ℂ)",
                    "erklaerungen" => [
                        [
                            "header" => "Definition komplexer Zahlen",
                            "erklaerung" => "Komplexe Zahlen haben die Form z = a + bi, wobei a und b reelle Zahlen sind und i die imaginäre Einheit ist, definiert durch i² = -1.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Schreibe eine komplexe Zahl auf, bei der der Realteil 3 und der Imaginärteil 4 ist.",
                            "tipp" => "Verwende die Form z = a + bi.",
                            "img-src" => "",
                            "loesungen" => ["3 + 4i"]
                        ],
                        [
                            "aufgabenstellung" => "Berechne das Quadrat der imaginären Einheit i.",
                            "tipp" => "Nutze die Definition von i.",
                            "img-src" => "",
                            "loesungen" => ["-1"]
                        ]
                    ]
                ],
                [
                    "definition" => "Transzendente Zahlen",
                    "erklaerungen" => [
                        [
                            "header" => "Definition transzendenter Zahlen",
                            "erklaerung" => "Transzendente Zahlen sind nicht algebraisch, das heißt, sie sind keine Lösung einer Polynomgleichung mit ganzzahligen Koeffizienten. Beispiele sind π und e.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Gib zwei bekannte transzendente Zahlen an.",
                            "tipp" => "Denke an mathematische Konstanten.",
                            "img-src" => "",
                            "loesungen" => ["π", "e"]
                        ],
                        [
                            "aufgabenstellung" => "Ist die Zahl √2 transzendent?",
                            "tipp" => "Überlege, ob sie Lösung einer Polynomgleichung ist.",
                            "img-src" => "",
                            "loesungen" => ["Nein"]
                        ]
                    ]
                ]
            ]
        ]
    ],
    "rechengesetze" => [
        [
            "titel" => "Rechengesetze I",
            "author" => "user",
            "img" => "../img/quarder.png",
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
        ],
        [
            "titel" => "Rechengesetze II",
            "author" => "user",
            "img" => "../img/quarder.png",
            "beschreibung" => "Ein Kurs über erweiterte Rechengesetze wie das Potenzgesetz und das Wurzelgesetz.",
            "kapitel" => [
                [
                    "definition" => "Potenzgesetze",
                    "erklaerungen" => [
                        [
                            "header" => "Was sind Potenzgesetze?",
                            "erklaerung" => "Potenzgesetze beschreiben Regeln für den Umgang mit Potenzen. Beispiele: a^m × a^n = a^(m+n), (a^m)^n = a^(m×n), und a^m / a^n = a^(m−n) für a ≠ 0.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Berechne 2^3 × 2^4 nach dem Potenzgesetz.",
                            "tipp" => "Addiere die Exponenten.",
                            "img-src" => "",
                            "loesungen" => [128]
                        ],
                        [
                            "aufgabenstellung" => "Berechne (3^2)^3 nach dem Potenzgesetz.",
                            "tipp" => "Multipliziere die Exponenten.",
                            "img-src" => "",
                            "loesungen" => [729]
                        ]
                    ]
                ],
                [
                    "definition" => "Wurzelgesetze",
                    "erklaerungen" => [
                        [
                            "header" => "Was sind Wurzelgesetze?",
                            "erklaerung" => "Wurzelgesetze beschreiben den Umgang mit Wurzeln. Beispiele: √(a × b) = √a × √b, √(a / b) = √a / √b (für b ≠ 0), und (√a)^2 = a.",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Berechne √(16 × 9) und vergleiche es mit √16 × √9.",
                            "tipp" => "Berechne beide Werte separat und vergleiche die Ergebnisse.",
                            "img-src" => "",
                            "loesungen" => [12, 12]
                        ],
                        [
                            "aufgabenstellung" => "Berechne √(25 / 4) und vergleiche es mit √25 / √4.",
                            "tipp" => "Teile zunächst die Wurzeln auf.",
                            "img-src" => "",
                            "loesungen" => [2.5, 2.5]
                        ]
                    ]
                ]
            ]
        ],
        [
            "titel" => "Rechengesetze III",
            "author" => "user",
            "img" => "../img/quarder.png",
            "beschreibung" => "Ein Kurs über Logarithmengesetze und besondere Regeln der Mathematik.",
            "kapitel" => [
                [
                    "definition" => "Logarithmengesetze",
                    "erklaerungen" => [
                        [
                            "header" => "Was sind Logarithmengesetze?",
                            "erklaerung" => "Logarithmengesetze beschreiben Regeln für den Umgang mit Logarithmen. Beispiele: log(a × b) = log(a) + log(b), log(a / b) = log(a) − log(b), und log(a^n) = n × log(a).",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Berechne log(10 × 100) mithilfe der Logarithmengesetze.",
                            "tipp" => "Zerlege die Multiplikation in einzelne Logarithmen.",
                            "img-src" => "",
                            "loesungen" => [3]
                        ],
                        [
                            "aufgabenstellung" => "Berechne log(100 / 10) mithilfe der Logarithmengesetze.",
                            "tipp" => "Nutze die Regel für Divisionen.",
                            "img-src" => "",
                            "loesungen" => [1]
                        ]
                    ]
                ],
                [
                    "definition" => "Besondere Regeln: Null und Eins",
                    "erklaerungen" => [
                        [
                            "header" => "Wie wirken Null und Eins in Rechnungen?",
                            "erklaerung" => "Null und Eins haben besondere Eigenschaften: a × 0 = 0, a + 0 = a, a × 1 = a, und a^0 = 1 (für a ≠ 0).",
                            "img-src" => ""
                        ]
                    ],
                    "aufgaben" => [
                        [
                            "aufgabenstellung" => "Berechne 7 × 0 und 7^0.",
                            "tipp" => "Nutze die Eigenschaften von Null und Eins.",
                            "img-src" => "",
                            "loesungen" => [0, 1]
                        ],
                        [
                            "aufgabenstellung" => "Berechne 12 + 0 und 12 × 1.",
                            "tipp" => "Beachte, wie sich Null und Eins auswirken.",
                            "img-src" => "",
                            "loesungen" => [12, 12]
                        ]
                    ]
                ]
            ]
        ]
    ]
];

$kurseTitle = [
    "geometrie" => "Geometrie",
    "zahlenmenge" => "Zahlenmenge",
    "rechengesetze" => "Rechengesetze",
];

$kurs = $kurse[$thema][$kursID];
$kurseThema = $kurse[$thema];