<?php
$messages = [
    [
        'sender' => 'M.Mustermann@HSGG.com',
        'recipient' => 'G.Meyer@HSGG.com',
        'topic' => 'Klassenfahrt',
        'message' =>    'Guten Tag Herr Meyer. Wann findet nochmal die Klassenfahrt statt?
                        Unser Sohn konnte sich leider nicht mehr erinnern. Mit freundlichen Grüßen Max Mustermann',
        'date' => '06.11.2024 / 14:42'
    ],
    [
        'sender' => 'H.Schauerte@HSGG.com',
        'recipient' => 'M.Mustermann@HSGG.com',
        'topic' => 'Nachzeigen',
        'message' => 'Ihr Sohn muss noch seine Hausaufgaben nachzeigen!',
        'date' => '08.11.2024 / 12:34'
    ],
    [
        'sender' => 'G.Meyer@HSGG.com',
        'recipient' => 'M.Mustermann@HSGG.com',
        'topic' => 'Klassenfahrt',
        'message' => 'Guten Tag Herr Mustermann! Die Klassenfahrt nach Rom findet vom 01.03.25 bis zum 07.03.25 statt.',
        'date' => '09.11.2024 / 18:43'
    ],
    [
        'sender' => 'M.Mustermann@HSGG.com',
        'recipient' => 'G.Meyer@HSGG.com',
        'topic' => 'Klassenfahrt',
        'message' => 'Alles klar, müssen wir unserem Sohn dafür noch etwas besorgen? Vielen Dank für die schnelle Rückmeldung!',
        'date' => '07.11.2024 / 19:12'
    ]
        ];

$klassen = [
    ['name' => '5a'],
    ['name' => '5b'],
    ['name' => '5c']
]
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nachrichten-Übersicht</title>
    <link rel="stylesheet" href="Kommunikation_Style.css">

</head>
<body>
<div id="main">
    <button id="openChatBtn">+ Neue Nachricht</button>
    <table>
        <thead>
        <tr>
            <th>Absender</th>
            <th>Empfänger</th>
            <th>Betreff</th>
            <th>Datum / Uhrzeit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($messages as $index => $message) {
            $rowId = "message-" . $index;
            echo '<tr class="clickable onclick="toggleRow(\'' . $rowId . '\')">';
            echo "<td>" . $message['sender'] . "</td>";
            echo "<td>" . $message['recipient'] . "</td>";
            echo "<td>" . $message['topic'] . "</td>";
            echo "<td>" . $message['date'] . "</td>";
            echo "</tr>" . '<tr class="hidden" id="' . $rowId . '">';
            echo '<td colspan="4">' . htmlspecialchars($message['message']) . "</td>";
            echo "</tr>";
        }
        ?>
        <script>
            function toggleRow(rowId) {
                let row = document.getElementById(rowId);
                if (row) {
                    let displayStyle = window.getComputedStyle(row).display;
                    if (displayStyle === "none") {
                        row.display = "table-row"; // Zeige die Zeile an
                    } else {
                        row.display = "none"; // Blende die Zeile aus
                    }
                }
            }
        </script>
        </tbody>
    </table>
</div>

<div id="chatContainer" class="chat-container">
    <div class="chat-header">
        <h3>Neue Nachricht</h3>
        <button id="closeChatBtn">_</button>
    </div>
    <div id="chat-bottom">
        <form>
            <div>
                <input type="text" class="msg-input" id="recipient" name="recipient" placeholder="Empfänger eingeben...">
                <select name="verteiler" id="verteiler">
                    <option value="Klassen" selected>Klassen</option>
                    <?php
                    foreach($klassen as $klasse){
                        echo '<option value="' . $klasse['name'] . '">' . $klasse['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <input type="text" class="msg-input" id="topic" name="topic" placeholder="Betreff eingeben...">
            <textarea class="msg-input" id="messageInput" name="message" placeholder="Nachricht eingeben..."></textarea><br>
            <button type="submit" id="sendMessageBtn">Senden</button>
        </form>
        <script>

            document.getElementById('openChatBtn').addEventListener('click', function() {
                document.getElementById('chatContainer').style.display = 'grid';
            });

            document.getElementById('closeChatBtn').addEventListener('click', function() {
                document.getElementById('chatContainer').style.display = 'none';
            });

            document.getElementById('sendMessageBtn').addEventListener('click', sendMessage);

            function sendMessage() {
                var message = document.getElementById('messageInput').value;
                if (message.trim() !== '') {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'send_message.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Nachricht zur Chat-Box hinzufügen
                            document.getElementById('chatMessages').innerHTML += '<p>' + message + '</p>';
                            document.getElementById('messageInput').value = '';
                        }
                    };
                    xhr.send('message=' + encodeURIComponent(message));
                }
            }
        </script>
    </div>
</div>

</body>
</html>