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
        "topic" => "Das soll ein realistischerer Betreff sein test test hallo bitte funktionier",
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
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>Nachrichten-Übersicht</title>
    <link rel="stylesheet" href="/kommunikation/Kommunikation_Style.css">
</head>
<body>
<div id="main">
    <button id="openChatBtn">+ Neue Nachricht</button>
    <table>
        <colgroup>
            <col id="topic-col">
            <col id="sender-col">
            <col id="recipient-col">
            <col id="date-col">
        </colgroup>
        <thead>
        <tr>
            <th class="topic">Betreff</th>
            <th class="sender">Absender</th>
            <th class="recipient">Empfänger</th>
            <th class="date">Datum / Uhrzeit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($messages as $index => $message) {
            $rowId = "message-" . $index;
            echo '<tr class="clickable" onclick="toggleRow(\'' . $rowId . '\')">';
            echo "<td class='topic'>" . $message['topic'] . "</td>";
            echo "<td class='sender'>" . $message['sender'] . "</td>";
            echo "<td class='recipient'>" . $message['recipient'] . "</td>";
            echo "<td class='date'>" . $message['date'] . "</td>";
            echo "</tr>";
            echo '<tr class="hidden" id="' . $rowId . '">';
            echo '<td colspan="4">' . nl2br($message['message']) . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<div id="chatContainer" class="chat-container">
    <div class="chat-header">
        <h3>Neue Nachricht</h3>
        <button id="closeChatBtn">_</button>
    </div>
    <div id="chat-bottom">
        <form action="" method="post">
            <div>
                <input type="text" class="msg-input" id="recipient" name="recipient" placeholder="Empfänger eingeben..." required>
                <select name="verteiler" id="verteiler" onchange="updateRecipients()">
                    <option value="Klassen" selected>Klassen</option>
                    <?php
                    foreach($klassen as $name => $klasse){
                        echo '<option value="' . $name . '">' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <input type="text" class="msg-input" id="topic" name="topic" placeholder="Betreff eingeben..." required>
            <textarea class="msg-input" id="messageInput" name="message" placeholder="Nachricht eingeben..." required></textarea><br>
            <button type="submit" id="sendMessageBtn">Senden</button>
        </form>
    </div>
</div>

<script>
    function toggleRow(rowId) {
        let row = document.getElementById(rowId);
        if (row) {
            let displayStyle = window.getComputedStyle(row).display;
            if (displayStyle === "none") {
                row.style.display = "table-row"; // Zeige die Zeile an
            } else {
                row.style.display = "none"; // Blende die Zeile aus
            }
        }
    }

    document.getElementById('openChatBtn').addEventListener('click', function() {
        document.getElementById('chatContainer').style.display = 'grid';
    });

    document.getElementById('closeChatBtn').addEventListener('click', function() {
        document.getElementById('chatContainer').style.display = 'none';
    });

    document.getElementById('sendMessageBtn').addEventListener('click', sendMessage);

    function sendMessage() {
    }

    var klassenData = <?php echo json_encode($klassen); ?>;

    function updateRecipients() {
        var verteiler = document.getElementById('verteiler');
        var recipient = document.getElementById('recipient');
        var selectedClass = verteiler.value;

        if (selectedClass !== 'Klassen' && klassenData[selectedClass]) {
            recipient.value = klassenData[selectedClass]['parents'].join(', ');
        } else {
            recipient.value = '';
        }
    }

</script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
</body>
</html>