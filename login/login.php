<?php
// Verbindungsdaten zur SQL-Datenbank
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SchulDB"; // Aktualisierter Datenbankname

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// Benutzereingaben aus dem Formular
$email = $_POST['email'];
$pass = $_POST['password'];

// Abfrage vorbereiten und ausführen
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['passwort'])) {  // Angepasst an die Spalte 'passwort'
        // Session starten und Benutzerdaten speichern
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['rolle'];
        $_SESSION['vorname'] = $row['vorname']; // Vorname für Begrüßung speichern

        // Benutzer abhängig von der Rolle weiterleiten
        if ($row['rolle'] == 'schüler') {
            header("Location: schueler_dashboard.php");     //TODO:
        } elseif ($row['rolle'] == 'lehrer') {
            header("Location: lehrer_dashboard.php");       //TODO:
        } elseif ($row['rolle'] == 'eltern') {
            header("Location: eltern_dashboard.php");       //TODO:
        } elseif ($row['rolle'] == 'admin') {
            header("Location: admin_dashboard.php"); // Optional für Admins
        }
        exit();
    } else {
        header("Location: login_failure.html");
        exit();
    }
} else {
    header("Location: login_failure.html");
    exit();
}

$stmt->close();
$conn->close();
?>
