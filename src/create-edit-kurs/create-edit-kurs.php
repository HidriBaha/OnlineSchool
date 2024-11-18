<?php
global $kurs;
include "../kurs.php";

?>
<html lang="de">
<head>
    <link rel="stylesheet" href="create-edit-kurs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Course Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css"> <!-- Link to style.css -->
    <title></title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F2F6F9;">
        <div class="container">
            <!-- Schullogo links -->
            <a class="navbar-brand" href="../index.php#">
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
                        <a class="dropdown-item" href="../login/logout.php">Abmelden</a>
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
    <dialog class="container create-edit-kurs-container">
        <h1>
            <?php echo $kurs["titel"] ?>
        </h1>
        <div class="kapitel-outer-container">
            <?php
            foreach ($kurs["kapitel"] as $keyKapitel => $kapitel) {
                echo "<div class='kapitel-container'>
                          <div class='kapitel-header-row'>";
                echo "<h2>" . ($keyKapitel + 1) . ". " . $kapitel["definition"] . "</h2>";
                echo "<form class='kapitel-button-row-container' method='post'>
                             <input class='btn btn-primary' type='submit' name='newDef' value='+Def'/>
                             <input class='btn btn-primary' type='submit' name='newErklaerung' value='+Erklärung'/>
                             <input class='btn btn-primary' type='submit' name='newUebung' value='+Übung'/>
                             <input class='btn btn-primary' type='submit' name='newConstraint' value='+Einschränkung'/>";
                echo "</form></div>";

                foreach ($kapitel["erklaerungen"] as $keyDef => $def) {
                    echo "<div class='def-container'>" . "<h3>" . ($keyKapitel + 1) . "." . ($keyDef + 1) . "    " . $def["header"] . "</h3>" . "</div>";

                    echo "<textarea name='erklaerung' class='textarea-def'>" . $def["erklaerung"] . "</textarea>";
                }

                foreach ($kapitel["aufgaben"] as $keyAufgabe => $aufgabe) {
                    echo " <div class='kapitel-header-row'>" . "<div class='def-container'>" . "<h3>" . ($keyKapitel + 1) . "." . ($keyAufgabe + 1) . " Übung" . "</h3>" . "</div>" . "<form class='kapitel-button-row-container' method='post' >" . "<input class='btn btn-primary' type='submit' name='newConstraint' value='+Lösung'/>" . "</form>" . "</div>";

                    echo "<textarea name='aufgaben' class='textarea-def'>" . $aufgabe["aufgabenstellung"] . "</textarea>";
                    echo "<div class='loesungen-container'>";
                    foreach ($aufgabe["loesungen"] as $keyLoesung => $loesung) {

                        echo "<div class='loesung-container'><label class='loesung-label' for='input-loesung'>Aufgaben</label>
                               <input id='input-loesung' name='" . $keyKapitel . "." . $keyDef . "." . $keyAufgabe . "." . $keyLoesung . "' value='" . $loesung . "'/></div>";

                    }
                    echo "</div>";
                }
                echo "</div>";
            }
            ?>
        </div>
        <form class="action-button-container" method="post">
            <input class="btn btn-primary" type="submit" value="Erstellen" name="create">
            <input class="btn btn-secondary" type="submit" value="Verwerfen" name="discard">
        </form>
    </dialog>
</main>
</body>
</html>
