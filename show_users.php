<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Benutzerübersicht</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Benutzerübersicht</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Rolle</th>
    </tr>

    <?php
    // Verbindungsdaten zur SQL-Datenbank
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SchulDB"; // Der angegebene Datenbankname

    // Verbindung zur Datenbank herstellen
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verbindungsfehler prüfen
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Benutzer aus der Tabelle 'users' abrufen
    $sql = "SELECT user_id, email, vorname, nachname, rolle FROM users";
    $result = $conn->query($sql);

    // Benutzer in die Tabelle einfügen
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vorname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nachname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['rolle']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Keine Benutzer gefunden.</td></tr>";
    }

    // Verbindung schließen
    $conn->close();
    ?>
</table>
</body>
</html>
