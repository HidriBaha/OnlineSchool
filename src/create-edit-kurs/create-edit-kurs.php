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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="../style.css"> <!-- Link to style.css -->
    <title></title>
</head>
<body>
<header>
    <?php include "../Vorlage/NavBar.html" ?>
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
