<?php
global $kurs;
include "kurs.php";


?>
<html lang="de">
<head>
    <link rel="stylesheet" href="create-edit-kurs.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Course Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Link to style.css -->
    <title></title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F2F6F9;">
        <div class="container">
            <!-- School Logo on the left -->
            <a class="navbar-brand" href="#">
                <img src="img/school-logo.png" class="logo" alt="School Logo">
            </a>

            <!-- Navbar Links (Aligned to Left) -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Geometrie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Zahlenmenge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rechengesetze</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Wiederholen</a>
                    </li>
                </ul>
            </div>

            <!-- Icons on the right -->
            <div class="d-flex">
                <!-- Communication Icon with Dropdown -->
                <div class="nav-item dropdown me-3">
                    <a href="#" class="nav-link" id="communicationIcon">
                        <i class="bi bi-chat-dots" style="font-size: 1.5rem;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" id="communicationDropdown" style="display: none;">
                        <a class="dropdown-item" href="#">Message 1</a>
                        <a class="dropdown-item" href="#">Message 2</a>
                        <a class="dropdown-item" href="#">Message 3</a>
                    </div>
                </div>

                <!-- User Profile Icon with Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" id="profileIcon">
                        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" id="profileDropdown" style="display: none;">
                        <a class="dropdown-item" href="#">View Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <dialog class="create-edit-kurs-container">
        <h1>
            Neuer Kurs
        </h1>
        <div class="kapitel-outer-container">
            <?php
            foreach ($kurs["kapitel"] as $keyKapitel => $kapitel) {
                echo "<div class='kapitel-container'>
                          <div class='kapitel-header-row'>";
                echo "<h2>" . ($keyKapitel + 1) . " " . $kapitel["definition"] . "</h2>";
                echo "<form class='kapitel-button-row-container' method='post'>
                             <input class='kapitel-input-button' type='submit' name='newDef' value='+Def'/>
                             <input class='kapitel-input-button' type='submit' name='newErklaerung' value='+Erklärung'/>
                             <input class='kapitel-input-button' type='submit' name='newUebung' value='+Übung'/>
                             <input class='kapitel-input-button' type='submit' name='newConstraint' value='Einschränkung'/>";
                echo "</form></div>";

                foreach ($kapitel["erklaerungen"] as $keyDef => $def) {
                    echo "<div class='def-container'>" . "<h3>" . ($keyKapitel + 1) . ". " . ($keyDef + 1) . "    " . $def["header"] . "</h3>" . "</div>";

                    echo "<textarea name='erklaerung' >" . $def["erklaerung"] . "</textarea>";
                }

                foreach ($kapitel["aufgaben"] as $keyAufgabe => $aufgabe) {
                    echo " <div class='kapitel-header-row'>" . "<div class='def-container'>" . "<h3>" . ($keyKapitel + 1) . ". " . ($keyAufgabe + 1) . " Übung" . "</h3>" . "</div>" . "<form class='kapitel-button-row-container' method='post' >" . "<input class='kapitel-input-button' type='submit' name='newConstraint' value='+Lösung'/>" . "</form>" . "</div>";

                    echo "<label for='text'>Aufgaben</label>
                     <textarea id='text' name='aufgaben' >" . $aufgabe["aufgabenstellung"] . "</textarea>";
                    echo "<div class='loesungen-container'>";
                    foreach ($aufgabe["loesungen"] as $keyLoesung => $loesung) {

                        echo "<div class='loesung-container'><label for='input-loesung'>Aufgaben</label>
                               <input id='input-loesung' name='".$keyKapitel.".".$keyDef.".".$keyAufgabe.".".$keyLoesung."' value='" . $loesung . "'/></div>";

                    }
                    echo "</div>";
                }
                echo "</div>";
            }
            ?>
        </div>
        <form class="action-button-container" method="post">
            <input class="action-button" type="submit" value="Erstellen" name="create">
            <input class="action-button" type="submit" value="Verwerfen" name="discard">
        </form>
    </dialog>
</main>
</body>
</html>
