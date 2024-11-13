<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Benutzerübersicht</title>
    <style>
        /* Hauptfarbe und Farbpalette */
        :root {
            --hauptfarbe: #236C93;
            --akzentfarbe: #307599;
            --kopfzeilenfarbe: #f2f6f9;
            --zeilenfarbe-hell: #e5eef2;
            --zeilenfarbe-dunkel: #d6e5ec;
            --textfarbe: #333;
            --randfarbe: #4A8A66;
        }

        /* Allgemeine Stile */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f6f9;
            color: var(--textfarbe);
            margin: 0;
            padding: 0;
        }

        /* Überschrift */
        h2 {
            text-align: center;
            color: var(--hauptfarbe);
            margin-top: 20px;
        }

        /* Tabellenstil */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid var(--randfarbe);
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: var(--kopfzeilenfarbe);
            color: var(--hauptfarbe);
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: var(--zeilenfarbe-hell);
        }

        tr:nth-child(odd) {
            background-color: var(--zeilenfarbe-dunkel);
        }

        /* Hover-Effekt für Tabellenzeilen */
        tr:hover {
            background-color: var(--akzentfarbe);
            color: #fff;
            transition: background-color 0.3s ease;
        }

        /* Responsive Design für Mobilgeräte */
        @media (max-width: 768px) {
            table {
                width: 90%;
            }
            th, td {
                padding: 8px;
                font-size: 14px;
            }
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
        <th>Geburtsdatum</th>
        <th>Adresse</th>
    </tr>

    <?php
    // Verbindungsdaten zur SQL-Datenbank
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SchulDB";

    // Verbindung zur Datenbank herstellen
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verbindungsfehler prüfen
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Benutzer aus der Tabelle 'users' abrufen, aber ohne die Passwort-Spalte
    $sql = "SELECT id, email, vorname, nachname, rolle, geburtsdatum, adresse FROM users";
    $result = $conn->query($sql);

    // Benutzer in die Tabelle einfügen
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vorname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nachname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['rolle']) . "</td>";
            echo "<td>" . htmlspecialchars($row['geburtsdatum']) . "</td>";
            echo "<td>" . htmlspecialchars($row['adresse']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Keine Benutzer gefunden.</td></tr>";
    }

    // Verbindung schließen
    $conn->close();
    ?>
</table>
</body>
</html>
