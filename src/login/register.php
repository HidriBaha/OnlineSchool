<?php
// Verbindungsdaten zur SQL-Datenbank
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SchulDB";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// Benutzereingaben aus dem Formular
$email = $_POST['email'];
$pass = $_POST['password'];
$role = $_POST['role'];
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$geburtsdatum = $_POST['geburtsdatum'];
$adresse = $_POST['adresse'];

// Passwort verschlüsseln
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Benutzer in die Datenbank einfügen
$sql = "INSERT INTO users (email, passwort, rolle, vorname, nachname, geburtsdatum, adresse) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $email, $hashed_password, $role, $vorname, $nachname, $geburtsdatum, $adresse);

try {
    if ($stmt->execute()) {
        echo "Registrierung erfolgreich! Sie können sich nun einloggen.";
        header("Location: index.html");
    } else {
        echo "Fehler bei der Registrierung: " . $stmt->error;
    }
} catch (Exception $e) {
    header("Location: register.html");
}

$stmt->close();
$conn->close();
?>
