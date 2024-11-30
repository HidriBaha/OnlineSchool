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
    <?php include "../Vorlage/NavBar.php"; ?>
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