<?php
include "../messages.php";
session_start();

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Kommunikation_Style.css">
    <link rel="stylesheet" href="../public/css/style.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>Nachrichten-Übersicht</title>

</head>
<header>
    <?php include "../Vorlage/NavBar.php"; ?>
</header>
<body>
<div id="main">
    <button id="openChatBtn">+ Neue Nachricht</button>
    <table id="messages-table">
        <colgroup>
            <col id="topic-col">
            <col id="sender-col">
            <col id="recipient-col">
            <col id="date-col">
        </colgroup>
        <thead>
        <tr>
            <th class="messages-th topic">Betreff</th>
            <th class="messages-th sender">Absender</th>
            <th class="messages-th recipient">Empfänger</th>
            <th class="messages-th date">Datum / Uhrzeit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($messages as $index => $message) {
            $rowId = "message-" . $index;
            echo '<tr class="messages-td clickable" onclick="toggleRow(\'' . $rowId . '\')">';
            echo "<td class='messages-td topic'>" . $message['topic'] . "</td>";
            echo "<td class='messages-td sender'>" . $message['sender'] . "</td>";
            echo "<td class='messages-td recipient'>" . $message['recipient'] . "</td>";
            echo "<td class='messages-td date'>" . $message['date'] . "</td>";
            echo "</tr>";
            echo '<tr class="hidden" id="' . $rowId . '">';
            echo '<td colspan="4">' . nl2br($message['message']) . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<div id="chatContainer">
    <div id="chatHeader">
        <h3>Neue Nachricht</h3>
        <button id="closeChatBtn"></button>
    </div>
    <div id="chat-bottom">
        <form action="" method="post">
            <div>
                <input type="text" class="msg-input" id="recipient" name="recipient" placeholder="Empfänger eingeben..." required>
                <select name="verteiler" id="verteiler" class="dropdown" onchange="updateRecipients()">
                    <option value="Klassen" selected>Klassen</option>
                    <?php
                    foreach($klassen as $name => $klasse){
                        echo '<option class="dropdown-content" value="' . $name . '">' . $name . '</option>';
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

        // Expose PHP session variable to JavaScript
        const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
</script>
<script src="../public/js/main.js"></script>

</body>
</html>