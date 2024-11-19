<?php
include "../messages.php";
session_start();

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Kommunikation_Style.css">
    <link rel="stylesheet" href="../style.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <title>Nachrichten-Übersicht</title>

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F2F6F9;">
        <div class="container">
            <!-- Schullogo links -->
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo.png" class="logo" alt="Schullogo">
            </a>

            <!-- Navbar-Links (Links ausgerichtet) -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../kurs-overview/kurs-overview.php?thema=geometrie">Geometrie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kurs-overview/kurs-overview.php?thema=zahlenmenge">Zahlenmenge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kurs-overview/kurs-overview.php?thema=rechengesetze">Rechengesetze</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wiederholen</a>
                    </li>
                </ul>
            </div>

            <!-- Symbole rechts -->
            <div class="d-flex">
                <!-- Kommunikationssymbol mit Dropdown -->
                <div class="nav-item dropdown me-3">
                    <a href="#" class="nav-link" id="communicationIcon">
                        <i class="bi bi-chat-dots" style="font-size: 1.5rem;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" id="communicationDropdown" style="display: none;">
                        <a class="dropdown-item" href="#">Nachricht 1</a>
                        <a class="dropdown-item" href="#">Nachricht 2</a>
                        <a class="dropdown-item" href="#">Nachricht 3</a>
                    </div>
                </div>

                <!-- Benutzersymbol mit Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" id="profileIcon">
                        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" id="profileDropdown" style="display: none;">
                        <a class="dropdown-item" href="#">Profil ansehen</a>
                        <a class="dropdown-item" href="#">Einstellungen</a>
                        <a class="dropdown-item" href="login/logout.php">Abmelden</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Modal for Contact Form -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Kontaktformular</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                </div>
                <div class="modal-body">
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Ihr Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Empfänger</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Nachricht</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary" id="submitForm">Absenden</button>
                </div>
            </div>
        </div>
    </div>
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
<script src="../main.js"></script>

</body>
</html>