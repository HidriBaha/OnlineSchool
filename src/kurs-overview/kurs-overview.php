<?php
include "../kurs.php";
global $kurseThema;
global $kurseTitle;
global $thema;
session_start();

?>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurs Ansicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css"> <!-- Link to style.css -->
    <link rel="stylesheet" href="kurs-overview.css">
    <script>
    // Expose PHP session variable to JavaScript
    const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    </script>
    <script src="kurs-overview.js"></script>
</head>
<body>
<header>
    <?php include "../Vorlage/NavBar.php"; ?>
</header>
<main>
    <div class="container outer">
        <div class="list">
            <div class="Aufgabe-container">
                <div class="course-title"><?php echo $kurseTitle[$_GET[THEMA] ?? "geometrie"]; ?></div>
                <div class="progress-container mb-4">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%; background-color: #236C93;"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            60%
                        </div>
                    </div>
                </div>
            </div>
            <div class="kurs-liste">
                <?php
                foreach ($kurseThema as $key => $kursPerThema) {
                    echo "<div class='course-container'>" .
                        "<div class='course-title'>" . $kursPerThema["titel"] . "</div>" .
                        "<div class='progress-container mb - 4''>" .
                        "<div class='progress'>" .
                        "<div class='progress-bar' role='progressbar' >" .
                        "60 %" .
                        "</div >" .
                        "</div >" .
                        "</div >" .
                        "<p class='course-description' >" . $kursPerThema["beschreibung"] . "</p >" .
                        "<div hidden class='image-store'>" . $kursPerThema["img"] . "</div>" .
                        "<a href = '../edit-kurs-schueler/edit-kurs-schueler.php?thema=" . $thema . "&kursID=" . $key . "' class='btn btn-primary' > Kurs starten </a >" .
                        "</div >";
                }
                ?>
            </div>
        </div>
        <div class="preview-container" id="preview-container">
            <div></div>
        </div>
    </div>

    <script src="../public/js/main.js"></script>

</main>
</body>

</html>
