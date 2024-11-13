<?php
session_start();

// Überprüfen, ob der Benutzer eingeloggt ist und die Rolle "schüler" hat
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'schüler') {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Schüler Dashboard</title>
</head>
<body>
<h2>Willkommen im Schüler-Dashboard, <?php echo htmlspecialchars($_SESSION['vorname']); ?>!</h2>
<p>Hier finden Sie alle Informationen speziell für Schüler.</p>
</body>
</html>
