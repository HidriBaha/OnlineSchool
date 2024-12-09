-- Fach 'Mathe' hinzufügen
INSERT INTO FAECHER (NAME)
VALUES ('Mathe');
SET @FAECHER_ID = LAST_INSERT_ID();

-- Thema 'Geometrie' hinzufügen
INSERT INTO THEMA (NAME, FAECHER_ID)
VALUES ('Geometrie', @FAECHER_ID);
SET @THEMA_ID = LAST_INSERT_ID();

-- Kurse hinzufügen
INSERT INTO KURSE (ID, KURS_NR, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID)
VALUES (1, 1, 'Geometrie I', 'user', '../img/quarder.png',
        'Eine kurze Erklärung zum Kurs Geometrie I. Dieser Kurs behandelt die Grundlagen der Geometrie, einschließlich Formen, Winkel und Flächen.',
        @THEMA_ID),
       (2, 2, 'Geometrie II', 'user', '../img/quarder.png', 'Das ist der zweite Kurs', @THEMA_ID),
       (3, 3, 'Geometrie III', 'user', '../img/quarder.png', 'Das ist der dritte Kurs', @THEMA_ID);

-- Kapitel für Geometrie I
INSERT INTO KAPITEL (KURS_ID, KAPITEL_NR, DEFINITION)
VALUES (1, 1, 'Grundbegriffe der Geometrie: Punkt, Linie, Ebene'),
       (1, 2, 'Winkel und deren Messung');

-- Erklärungen für Geometrie I
INSERT INTO ERKLAERUNGEN (ERKLAERUNGEN_NR, KURS_ID, KAPITEL_NR, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 1, 1, 'Erklärung zur Definition von Punkten und Linien',
        'Ein Punkt hat keine Ausdehnung und dient als Position. Eine Linie ist eine gerade, unendlich lange Verbindung von Punkten.',
        '../img/aufgaben/gerade.png'),
       (2, 1, 2, 'Erklärung zu Winkeln',
        'Ein Winkel wird durch zwei Linien definiert, die sich in einem Punkt schneiden. Der Abstand zwischen diesen Linien wird in Grad gemessen.',
        '');

-- Aufgaben für Geometrie I
INSERT INTO AUFGABEN (AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (1, 1, 1, 'Zeichne zwei Punkte A (2, 3) und B (6, 3) und verbinde sie mit einer Linie.',
        'Nutze ein Lineal, um die Linie gerade zu ziehen.', ''),
       (2, 1, 2,
        'Zeichne zwei Linien, die sich im Punkt O (0, 0) schneiden. Wähle auf der ersten Linie die Punkte A (4, 0) und B (-4, 0). Auf der zweiten Linie wähle die Punkte C (0, 5) und D (0, -5). Miss den Winkel ∠AOC mit einem Geodreieck.',
        'Achte darauf, das Geodreieck genau am Punkt O (0, 0) auszurichten und die Linien präzise zu zeichnen.',
        '../img/aufgaben/winkel.png');

-- Lösungen für Geometrie I
INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (2, '90');

-- Kapitel für Geometrie II
INSERT INTO KAPITEL (KURS_ID, KAPITEL_NR, DEFINITION)
VALUES (2, 1, 'Transformationen: Translation, Rotation, Spiegelung'),
       (2, 2, 'Symmetrie und Kongruenz');

-- Erklärungen für Geometrie II
INSERT INTO ERKLAERUNGEN (ERKLAERUNGEN_NR, KURS_ID, KAPITEL_NR, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 2, 1, 'Grundlagen der geometrischen Transformationen',
        'Eine Transformation beschreibt die Bewegung oder Änderung einer Figur im Raum, ohne deren Form zu verändern.',
        ''),
       (2, 2, 2, 'Was sind symmetrische Figuren?',
        'Eine Figur ist symmetrisch, wenn sie durch eine Spiegelung an einer Linie oder einer Rotation um einen Punkt auf sich selbst abgebildet werden kann.',
        '');

-- Aufgaben für Geometrie II
INSERT INTO AUFGABEN (AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (1, 2, 1,
        'Verschiebe das Dreieck mit den Punkten A (1, 1), B (4, 1) und C (2, 3) um den Vektor (3, 2). Zeichne das resultierende Dreieck.',
        'Addiere den Vektor (3, 2) zu jedem Punkt des Dreiecks.', ''),
       (2, 2, 2,
        'Zeichne ein Quadrat mit den Eckpunkten A (0, 0), B (4, 0), C (4, 4), und D (0, 4). Spiegele das Quadrat an der Linie x = 2.',
        'Finde zuerst die Spiegelpunkte, indem du den Abstand zur Spiegelachse berechnest.', '');

-- Lösungen für Geometrie II
INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (3, "A' (4, 0)"),
       (3, "B' (0, 0)"),
       (3, "C' (0, 4)"),
       (3, "D' (4, 4)");

-- Kapitel für Geometrie III
INSERT INTO KAPITEL (KURS_ID, KAPITEL_NR, DEFINITION)
VALUES (3, 1, 'Vektorgeometrie: Vektoren, Skalare und Operationen'),
       (3, 2, 'Geraden und Ebenen im Raum');

-- Erklärungen für Geometrie III
INSERT INTO ERKLAERUNGEN (ERKLAERUNGEN_NR, KURS_ID, KAPITEL_NR, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 3, 1, 'Einführung in die Vektorrechnung',
        'Ein Vektor repräsentiert eine gerichtete Größe im Raum, definiert durch eine Richtung und eine Länge. Operationen wie Addition und Skalarmultiplikation ermöglichen die Manipulation von Vektoren.',
        ''),
       (2, 3, 2, 'Parametergleichung einer Geraden',
        'Eine Gerade im Raum wird durch einen Stützpunkt und einen Richtungsvektor definiert. Die Parametergleichung lautet: g: r(t) = p + t * d, wobei p der Stützpunkt und d der Richtungsvektor ist.',
        '');

-- Aufgaben für Geometrie III
INSERT INTO AUFGABEN (AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (1, 3, 1, 'Berechne die Summe der Vektoren a = (2, 3) und b = (-1, 4).',
        'Addiere die jeweiligen Komponenten der Vektoren.', ''),
       (2, 3, 2,
        'Gegeben sei der Punkt P (1, 2, 3) und der Richtungsvektor d = (2, -1, 1). Schreibe die Parametergleichung der Geraden g.',
        'Verwende die Formel r(t) = p + t * d.', '');

-- Lösungen für Geometrie III
INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (5, 'Ergebnis: (1, 7)'),
       (6, 'r(t) = (1, 2, 3) + t * (2, -1, 1)');


-- Thema 'Zahlenmengen' hinzufügen
INSERT INTO THEMA (NAME, FAECHER_ID)
VALUES ('Zahlenmenge', @FAECHER_ID);
SET @THEMA_ID = LAST_INSERT_ID();

-- Kurse hinzufügen
INSERT INTO KURSE (ID,KURS_NR, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID)
VALUES (4,1, 'Zahlenmenge I', 'user', '../img/zahlenmenge.svg',
        'Dieser Kurs behandelt verschiedene Zahlenmengen und ihre Eigenschaften und hilft den Schülern, verschiedene Zahloperationen zu verstehen.',
        @THEMA_ID),
       (5,2, 'Zahlenmenge II', 'user', '../img/zahlenmenge.svg', 'Ein Kurs über irrationale und reelle Zahlen.',
        @THEMA_ID),
       (6,3, 'Zahlenmenge III', 'user', '../img/zahlenmenge.svg', 'Ein Kurs über komplexe und transzendente Zahlen.',
        @THEMA_ID);

-- Kapitel für Zahlenmengen I
INSERT INTO KAPITEL (KURS_ID, KAPITEL_NR, DEFINITION)
VALUES (4, 1, 'Die Menge der natürlichen Zahlen (ℕ)'),
       (4, 2, 'Die Menge der ganzen Zahlen (ℤ)'),
       (4, 3, 'Die Menge der rationalen Zahlen (ℚ)');

-- Erklärungen für Zahlenmengen I
INSERT INTO ERKLAERUNGEN (ERKLAERUNGEN_NR, KURS_ID, KAPITEL_NR, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 4, 1, 'Definition natürlicher Zahlen',
        'Die natürlichen Zahlen (ℕ) umfassen alle positiven ganzen Zahlen, beginnend bei 1. Manche Definitionen schließen die 0 mit ein: ℕ = {1, 2, 3, ...} oder ℕ₀ = {0, 1, 2, ...}.',
        ''),
       (2, 4, 2, 'Definition ganzer Zahlen',
        'Die ganzen Zahlen (ℤ) umfassen die natürlichen Zahlen, ihre negativen Gegenzahlen und die Null: ℤ = {..., -3, -2, -1, 0, 1, 2, 3, ...}.',
        ''),
       (3, 4, 3, 'Definition rationaler Zahlen',
        'Rationale Zahlen (ℚ) sind alle Zahlen, die als Bruch geschrieben werden können, wobei der Zähler und der Nenner ganze Zahlen sind und der Nenner nicht null ist: ℚ = {p/q | p, q ∈ ℤ, q ≠ 0}.',
        '');

-- Aufgaben für Zahlenmengen I
INSERT INTO AUFGABEN (AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (1, 4, 1, 'Schreibe die ersten fünf natürlichen Zahlen auf.', 'Denke daran, dass sie bei 1 beginnen.', ''),
       (2, 4, 1, 'Welche Zahl ist die kleinste natürliche Zahl?', 'Überlege, ob die Null dazugehört.', ''),
       (3, 4, 2,
        'Gib fünf aufeinanderfolgende ganze Zahlen an, die sowohl positive als auch negative Zahlen enthalten.',
        'Beginne bei -2.', ''),
       (4, 4, 2, 'Ist die Zahl -7 eine natürliche Zahl oder eine ganze Zahl?',
        'Denke an die Definition der natürlichen Zahlen.', ''),
       (5, 4, 3, 'Schreibe drei Beispiele für rationale Zahlen auf.', 'Denke an Brüche wie 1/2 oder 3/4.', ''),
       (6, 4, 3, 'Ist die Zahl 0.75 eine rationale Zahl?', 'Überlege, ob sie als Bruch dargestellt werden kann.', '');

-- Lösungen für Zahlenmengen I
INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (7, '1, 2, 3, 4, 5'),
       (8, '1'),
       (9, '-2, -1, 0, 1, 2'),
       (10, 'ganze Zahl'),
       (11, '1/2, 3/4, -5/2'),
       (12, 'Ja');

-- Kapitel für Zahlenmengen II
INSERT INTO KAPITEL (KURS_ID, KAPITEL_NR, DEFINITION)
VALUES (5, 1, 'Die Menge der irrationalen Zahlen'),
       (5, 2, 'Die Menge der reellen Zahlen (ℝ)');

-- Erklärungen für Zahlenmengen II
INSERT INTO ERKLAERUNGEN (ERKLAERUNGEN_NR, KURS_ID, KAPITEL_NR, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 5, 1, 'Definition irrationaler Zahlen',
        'Irrationale Zahlen können nicht als Bruch dargestellt werden. Sie haben unendliche, nicht periodische Dezimaldarstellungen. Beispiele sind √2 und π.',
        ''),
       (2, 5, 2, 'Definition reeller Zahlen',
        'Die Menge der reellen Zahlen umfasst alle rationalen und irrationalen Zahlen. Sie kann als die Menge aller Zahlen auf der Zahlengeraden beschrieben werden.',
        '');

-- Aufgaben für Zahlenmengen II
INSERT INTO AUFGABEN (AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (7, 5, 1, 'Gib ein Beispiel für eine irrationale Zahl an.', 'Denke an Wurzeln oder bekannte Konstanten wie π.',
        ''),
       (8, 5, 1, 'Kann die Zahl 1.414213... als Bruch dargestellt werden?',
        'Überlege, ob die Dezimaldarstellung periodisch ist.', ''),
       (9, 5, 2, 'Gib drei Beispiele für reelle Zahlen an.', 'Dazu gehören rationale und irrationale Zahlen.', ''),
       (10, 5, 2, 'Ist die Zahl -√7 eine reelle Zahl?', 'Überlege, ob sie auf der Zahlengeraden liegt.', '');

-- Lösungen für Zahlenmengen II
INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (13, '√2'),
       (14, 'Nein'),
       (15, '1, √3, π'),
       (16, 'Ja');

-- Kapitel für Zahlenmengen III
INSERT INTO KAPITEL (KURS_ID, KAPITEL_NR, DEFINITION)
VALUES (6, 1, 'Die Menge der komplexen Zahlen (ℂ)'),
       (6, 2, 'Transzendente Zahlen');

-- Erklärungen für Zahlenmengen III
INSERT INTO ERKLAERUNGEN (ERKLAERUNGEN_NR, KURS_ID, KAPITEL_NR, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 6, 1, 'Definition komplexer Zahlen',
        'Komplexe Zahlen haben die Form z = a + bi, wobei a und b reelle Zahlen sind und i die imaginäre Einheit ist, definiert durch i² = -1.',
        ''),
       (2, 6, 2, 'Definition transzendenter Zahlen',
        'Transzendente Zahlen sind nicht algebraisch, das heißt, sie sind keine Lösung einer Polynomgleichung mit ganzzahligen Koeffizienten. Beispiele sind π und e.',
        '');

-- Aufgaben für Zahlenmengen III
INSERT INTO AUFGABEN (AUFGABEN_NR, KURS_ID, KAPITEL_NR, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (11, 6, 1, 'Schreibe eine komplexe Zahl auf, bei der der Realteil 3 und der Imaginärteil 4 ist.',
        'Verwende die Form z = a + bi.', ''),
       (12, 6, 1, 'Berechne das Quadrat der imaginären Einheit i.', 'Nutze die Definition von i.', ''),
       (13, 6, 2, 'Gib zwei bekannte transzendente Zahlen an.', 'Denke an mathematische Konstanten.', ''),
       (14, 6, 2, 'Ist die Zahl √2 transzendent?', 'Überlege, ob sie Lösung einer Polynomgleichung ist.', '');

-- Lösungen für Zahlenmengen III
INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (17, '3 + 4i'),
       (18, '-1'),
       (19, 'π, e'),
       (20, 'Nein');



