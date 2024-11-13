<!DOCTYPE html>

<?php
	// Edit modes:
	// Edit the actual course or edit the course contents
	$GET_PARAM_MODE = 'mode';

	$mode = 'view'; // Switch between 'view' and 'edit' modes (default is 'view')
	if (!empty($_GET[$GET_PARAM_MODE])) {
		if ($_GET[$GET_PARAM_MODE] == 'edit')
			$mode = 'edit';
	}

	$kurs = [ // Get from DB later on
		'author' => 'user',
		'beschreibung' => 'Generic Kursbeschreibung',
		'kapitel' => [
			'definition' => 'BSP Kurs Definition.',
			'erklaerungen' => [
				'erklaerung' => 'Berechnen sie die NST',
				'img-src' => ''
			],
			'aufgaben' => [
				[
					'aufgabenstellung' => 'Welche Schnittpunkte hat die Gerade',
					'tipp' => 'NST berechnen',
					'img-src' => '',
					'loesungen' => [0, 1]
				]
			]
		]
	];

	function DisplayOrEdit ($text, $name) { // Checks the mode and either returns the text as is or enables a input text field
		global $mode;
		if ($mode == 'view') {
			return $text;
		}
		else {
			return ('<input size="80" class="input-text" type="text" value="'.$text.'" name="'.$name.'" width="80vw">');
		}
	}
?>

<html lang="de">
    <head>
        <meta charset="UTF-8">
	    <link rel="stylesheet" href="Teacher-EditCourse.css">
        <title>Lehrer_Kurs Editieren</title>
    </head>
    <body>
		<header>
			<a href="?clicked=true"><div class="test">HEADER Placeholder</div></a> <!-- TEST FOR CLICKABLE IMAGES/AREAS -->
		</header>
        <div class="kursinhalt">
	        <div class='edit'><?php if ($mode == 'view')
				echo "<form action='?mode=edit' method='post'><input id='edit-button' type='submit' value='EDIT'></form>"; ?>
	        </div>
	        <?php if ($mode == 'edit') echo "<form action='save_course.php' method='post'>"; ?> <!-- open and close form if course is being edited -->

	        <h1><?php echo DisplayOrEdit($kurs['beschreibung'], 'beschreibung'); ?></h1>
	        <!-- TODO: Solidify course structure and add editable fields for all relevant options -->
	        <div class="definition">
		        <h3><?php echo DisplayOrEdit($kurs['kapitel']['definition'], 'definition'); ?></h3><br>
		        <h3>Übungserklärung:</h3>
                <?php echo DisplayOrEdit($kurs['kapitel']['erklaerungen']['erklaerung'], 'erklaerung'); ?>
		        <br><h3>Übungen</h3>
		        <ol>
                <?php
                    foreach ($kurs['kapitel']['aufgaben'] as $aufgabe) {
                        echo "<li>".DisplayOrEdit($aufgabe['aufgabenstellung'], 'erklaerung')."</li>";
						foreach ($aufgabe['loesungen'] as $loesung) {
                            if ($mode == 'edit')
                                echo "<input name='submitted['" . $loesung . "']' type='text' value='$loesung' class='solution-field'>";
                            else
                                echo "<input name='submitted['" . $loesung . "']' type='text' placeholder='Bitte Loesung eintragen' class='solution-field'>";

                        }
                    }
                ?>
		        </ol>

	        </div>

	        <div class="save">
		        <?php if ($mode == 'edit') {
                    echo "<a href='Teacher-EditCourse.php'><input id='abort-button' type='button' value='Abbrechen'></a>";
                    echo "<input id='save-button' type='submit' value='Speichern'>";
                }
				echo "</form>"; ?>
	        </div>
        </div>
    </body>
</html>