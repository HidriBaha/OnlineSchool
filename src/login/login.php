

<?php
session_start(); // Session starten


// Verbindungsdaten zur SQL-Datenbank
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "schuldb"; // Aktualisierter Datenbankname

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
        //  console.log("Role from PHP:", role);
        // Benutzer abhängig von der Rolle weiterleiten
        echo "Logged in as: " . $_SESSION['role'];
        header("Location: ../index.php");        exit();
    } else {
        //$_SESSION['error'] = "E-Mail oder Falsches Passwort nicht gefunden.";
        exit();
    }
} else {
    //$_SESSION['error'] = "E-Mail oder Falsches Passwort nicht gefunden.";
    header("Location: index.html");
    echo "Logged in role is: " . $_SESSION['role'];
    exit();
}

$stmt->close();
$conn->close();
?>
