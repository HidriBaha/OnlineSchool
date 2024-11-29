<?php
session_start(); // Start the session to access session variables
include "messages.php";// Include the communication data (messages array and class data)
include "kurs.php";
global $kurse;
// Sort the messages array by date in descending order to get the most recent messages first
usort($messages, function ($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Get the most recent 4 messages
$recentMessages = array_slice($messages, 0, 4);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathe-Kurs Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Link zu style.css -->
</head>
<body>
<!-- Navbar -->
<?php include 'Vorlage/NavBar.php'; ?>
<!-- Restlicher Seiteninhalt -->
</header>
<main>
<section class="container mt-4">
    <!-- Fortschrittsbereich -->
    <div class="container mt-4">
        <!-- Fortschrittsbereich (Sichtbar für Schüler) -->
        <div id="progressSection" style="display: block;">
            <h2>Fortschritt</h2>
            <!-- Geometrie I -->
            <div class="progress-container mb-4">
                <h5>Geometrie I</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%; background-color: #236C93;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        60%
                    </div>
                </div>
            </div>

            <!-- Geometrie II -->
            <div class="progress-container mb-4">
                <h5>Geometrie II</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0; background-color: #236C93;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        0%
                    </div>
                </div>
            </div>

            <!-- Geometrie III -->
            <div class="progress-container mb-4">
                <h5>Geometrie III</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%; background-color: #236C93;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        100%
                    </div>
                </div>
            </div>
        </div>
        <!-- Kursbereich -->
        <!-- Meine Kurse Bereich -->
        <h2 class="mt-4">Meine Kurse</h2>
        <div class="row">
            <!-- Kurskarte 1 - Geometrie -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-rulers" style="font-size: 3rem; color: #236C93;"></i> <!-- Symbol für Geometrie -->
                        <h5 class="card-title mt-3">Geometrie I</h5>
                        <p class="card-text"><?php echo $kurse["geometrie"][0]["beschreibung"] ?></p>
                        <a href="edit-kurs-schueler/edit-kurs-schueler.php?thema=geometrie&kursID=0" class="btn btn-primary">Zum Kurs</a>
                    </div>
                </div>
            </div>

            <!-- Kurskarte 2 - Zahlenmenge -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-calculator" style="font-size: 3rem; color: #236C93;"></i> <!-- Symbol für Zahlenmenge -->
                        <h5 class="card-title mt-3">Zahlenmenge</h5>
                        <p class="card-text"><?php echo $kurse["zahlenmenge"][0]["beschreibung"] ?></p>
                        <a href="edit-kurs-schueler/edit-kurs-schueler.php?thema=zahlenmenge&kursID=0" class="btn btn-primary">Zum Kurs</a>
                    </div>
                </div>
            </div>

            <!-- Kurskarte 3 - Rechengesetze -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-journal-text" style="font-size: 3rem; color: #236C93;"></i> <!-- Symbol für Rechengesetze -->
                        <h5 class="card-title mt-3">Rechengesetze</h5>
                        <p class="card-text"><?php echo $kurse["rechengesetze"][0]["beschreibung"] ?></p><br>
                        <a href="edit-kurs-schueler/edit-kurs-schueler.php?thema=rechengesetze&kursID=0" class="btn btn-primary">Zum Kurs</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Communication Section -->
        <div id="communicationTable" style="display: none;">
            <h2>Kommunikation</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Empfänger</th>
                    <th>Betreff</th>
                    <th>Gesendet am</th>
                </tr>
                </thead>
                <tbody>
                <!-- Messages go here -->


                <?php
                // Get the latest 4 messages from $messages
                $recentMessages = array_slice($messages, -4);
                foreach ($recentMessages as $message) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($message['recipient']) . '</td>';
                    echo '<td>' . htmlspecialchars($message['topic']) . '</td>';
                    echo '<td>' . htmlspecialchars($message['date']) . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            <a href="/kommunikation/Kommunikation.php" class="btn btn-primary mt-3">Alle Nachrichten anzeigen</a>


        </div>
</section>
<script>
    // Expose PHP session variable to JavaScript
    const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- Link to main.js -->
<script src="main.js"></script>
</main>
</body>
</html>
