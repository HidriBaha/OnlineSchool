<?php

$messages = [
    [
        "sender" => "M.Mustermann@HSGG.com",
        "recipient" => "G.Meyer@HSGG.com",
        "topic" => "Klassenfahrt",
        "message" =>    "Guten Tag Herr Meyer.\n\nWann findet nochmal die Klassenfahrt statt?
Unser Sohn konnte sich leider nicht mehr erinnern.\n\nMit freundlichen Grüßen Max Mustermann",
        "date" => "06.11.2024 / 14:42"
    ],
    [
        "sender" => "H.Schauerte@HSGG.com",
        "recipient" => "M.Mustermann@HSGG.com",
        "topic" => "Hausaufgaben",
        "message" => "Ihr Sohn muss noch seine Hausaufgaben nachzeigen!",
        "date" => "08.11.2024 / 12:34"
    ],
    [
        "sender" => "G.Meyer@HSGG.com",
        "recipient" => "M.Mustermann@HSGG.com",
        "topic" => "Klassenfahrt",
        "message" => "Guten Tag Herr Mustermann!\n\nDie Klassenfahrt nach Rom findet vom 01.03.25 bis zum 07.03.25 statt.",
        "date" => "09.11.2024 / 18:43"
    ],
    [
        "sender" => "M.Mustermann@HSGG.com",
        "recipient" => "G.Meyer@HSGG.com",
        "topic" => "Klassenfahrt",
        "message" => "Alles klar, müssen wir unserem Sohn dafür noch etwas besorgen?\n\nVielen Dank für die schnelle Rückmeldung!",
        "date" => "07.11.2024 / 19:12"
    ]
];

$klassen = [
    '5a' => [
        'parents' => [
            'L.Schmidt@HSGG.com',
            'A.Becker@HSGG.com',
            'S.Hoffmann@HSGG.com',
            'K.Wagner@HSGG.com',
            'T.Schulz@HSGG.com',
            'E.Fischer@HSGG.com',
            'R.Weber@HSGG.com',
            'N.Zimmermann@HSGG.com',
            'F.Krause@HSGG.com',
            'B.Richter@HSGG.com'
        ]
    ],
    '5b' => [
        'parents' => [
            'M.Mueller@HSGG.com',
            'C.Klein@HSGG.com',
            'P.Lange@HSGG.com',
            'J.Koch@HSGG.com',
            'D.Bauer@HSGG.com',
            'H.Schroeder@HSGG.com',
            'W.Schreiber@HSGG.com',
            'G.Huber@HSGG.com',
            'V.Fuchs@HSGG.com',
            'O.Schmitz@HSGG.com'
        ]
    ],
    '5c' => [
        'parents' => [
            'I.Wolf@HSGG.com',
            'U.Neumann@HSGG.com',
            'Y.Schwarz@HSGG.com',
            'Q.Braun@HSGG.com',
            'X.Zimmermann@HSGG.com',
            'Z.Krueger@HSGG.com',
            'A.Hofmann@HSGG.com',
            'B.Hartmann@HSGG.com',
            'C.Schmid@HSGG.com',
            'D.Werner@HSGG.com'
        ]
    ]
];
?>