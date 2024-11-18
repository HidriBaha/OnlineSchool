<?php
include "../kurs.php";
global $kurseThema;

?>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kurs Ansicht</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
              rel="stylesheet">
        <link rel="stylesheet" href="../style.css"> <!-- Link to style.css -->
        <link rel="stylesheet" href="kursansicht.css">
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F2F6F9;">
            <div class="container">
                <!-- Schullogo links -->
                <a class="navbar-brand" href="../index.php#">
                    <img src="../logo.png" class="logo" alt="Schullogo">
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
        <div class="Aufgabe-container">
            <div class="course-title">Geometrie</div>
            <div class="progress-container mb-4">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%; background-color: #236C93;"
                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        60%
                    </div>
                </div>
            </div>
        </div>
    <?php
        foreach ($kurseThema as $kursPerThema) {
        echo "<div class='course-container'>" .
                "<div class='course-title'>" . $kursPerThema["titel"] . "</div>" .
                "<div class='progress-container mb - 4''>" .
                    "<div class='progress'>" .
                        "<div class='progress-bar' role='progressbar' >" .
                            "60 %" .
                        "</div >" .
                    "</div >" .
                "</div >" .
                "<div class='course-description' >".$kursPerThema["beschreibung"]."</div >" .
                "<a href = 'https://example.com/geometrie1' class='btn btn-primary' > Kurs starten </a >" .
            "</div >";
        }
    ?>
</main >
</body >

</html >
