<!DOCTYPE html>

<?php
session_start();
include "../kurs.php";

global $kurs;
global $thema;
global $kursID;



$kapitelID = $_GET[KAPITEL] ?? 0;
if ($kapitelID >= count($kurs["kapitel"])) {
    $kapitelID = 0;
}

$kapitel = $kurs["kapitel"][$kapitelID];

function getNext($kurs,$thema,$kursID,$kapitelID):string
{
    if (($kapitelID+1) >= count($kurs["kapitel"])) {
        return "<a href='../kurs-overview/kurs-overview.php?thema=" . $thema . "&kursID=" . $kursID ."' class='btn btn-primary'>zurück zur &Uuml;bersicht</a>";
    }

    return "<a href='?thema=" . $thema . "&kursID=" . $kursID . "&kapitel=" . ++$kapitelID . "' class='btn btn-primary'>nächstes Kapitel</a>";
}

?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="edit-kurs-schueler.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="../style.css"> <!-- Link to style.css -->
    <title>Lehrer_Kurs Editieren</title>

</head>
<body>
<!-- Navbar -->
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
    <!-- Restlicher Seiteninhalt -->
</header>
<main>
    <div class="container kursinhalt">
        <!-- Get some Parameters and open Form -->
        <?php
        // echo "<input name='amount-tasks' type='hidden' value='" . $kurs['kapitel']['aufgaben'] . "'>";
        echo "<form action='#' method='post'>";
        ?> <!-- open and close form if course is being edited -->

        <!-- Course Description -->
        <h3><?php echo $kurs['beschreibung']; ?></h3>

        <!-- Course contents -->
        <div class="chapters">
            <div class="definition">
                <h2><?php echo $kapitel['definition']; ?></h2><br>
                <h4>Übungserklärung:</h4>
                <?php echo $kapitel['erklaerungen'][0]['erklaerung'];
                if(trim($kapitel['erklaerungen'][0]['img-src'])!="")echo "<br><img id='img-help' alt='Hilfsstellung IMG' src='" . $kapitel['erklaerungen'][0]['img-src'] . "'>";
                ?>
                <br><br>

                <h3>Übungen</h3>


                <ul>
                    <?php
                    $taskCounter = 0;
                    foreach ($kapitel['aufgaben'] as $aufgabe) {
                        echo "<li>" . $aufgabe['aufgabenstellung'] . "</li><br>";
                        if(trim($aufgabe['img-src']) != "") echo "<img class='img-task' alt='Aufgabe IMG' src='" . $aufgabe['img-src'] . "'><br>";

                        $loesungCounter = 0;
                        foreach ($aufgabe['loesungen'] as $loesung) {
                            echo "<input id='input-" . $taskCounter . "-" . $loesungCounter . "' 
                name='submitted-" . $taskCounter . "-" . $loesungCounter . "' 
                type='text' 
                placeholder='Bitte Loesung eintragen' 
class='form-control form-control-lg my-4 solution-field' 
                oninput='checkSolution(this)'>";

                            // Extract the hidden correct solution from $aufgabe['loesungen']
                            echo "<input type='hidden' id='hidden-solution-" . $taskCounter . "-" . $loesungCounter . "' 
                value='" . htmlspecialchars($loesung, ENT_QUOTES, 'UTF-8') . "'>";                            $loesungCounter++;
                            echo "<br><br>";
                            $taskCounter++;
                        }
                    }
                    ?>

                </ul>
<div>  </div>


                <script>

                </script>



            </div>
            <?php echo getNext($kurs,$thema,$kursID,$kapitelID); ?>
        </div>
    </div>

    <script>
        // Expose PHP session variable to JavaScript
        const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    </script>
    <script src="EKS.js"></script>
    <script src="../main.js"></script>

</main>
</body>
</html>