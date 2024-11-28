INSERT INTO FAECHER (ID, NAME)
VALUES (1, 'Mathe'),
       (2, 'Deutsch'),
       (3, 'English');

INSERT INTO THEMA (ID, NAME, FAECHER_ID)
VALUES (1, 'Geometrie', 1),
       (2, 'Zahlenmenge', 1),
       (3, 'Rechengesetze', 1);

INSERT INTO KURSE (ID, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID)
VALUES (1, 'Geometrie I', 'user', '../img/quarder.png',
        'Eine kurze Erklärung zum Kurs Geometrie I. Dieser Kurs behandelt die Grundlagen der Geometrie, einschließlich Formen, Winkel und Flächen.',
        1),
       (2, 'Geometrie II', 'user', '../img/quarder.png', 'Das ist der zweite Kurs', 1),
       (3, 'Geometrie III', 'user', '../img/quarder.png', 'Das ist der dritte Kurs', 1);

INSERT INTO KURSE (ID, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID)
VALUES (4, 'Zahlenmengen I', 'user', '../img/zahlenmenge.svg',
        'Dieser Kurs behandelt verschiedene Zahlenmengen und ihre Eigenschaften und hilft den Schülern, verschiedene Zahloperationen zu verstehen.',
        1),
       (5, 'Zahlenmengen II', 'user', '../img/zahlenmenge.svg', 'Ein Kurs über irrationale und reelle Zahlen.', 1),
       (6, 'Zahlenmengen III', 'user', '../img/zahlenmenge.svg', 'Ein Kurs über komplexe und transzendente Zahlen.', 1);

INSERT INTO KURSE (ID, TITEL, AUTHOR, IMG, BESCHREIBUNG, THEMA_ID)
VALUES (7, 'Rechengesetze I', 'user', '../img/quarder.png',
        'Ein Kurs über grundlegende Rechengesetze wie das Kommutativ-, Assoziativ- und Distributivgesetz.', 1),
       (8, 'Rechengesetze II', 'user', '../img/quarder.png',
        'Ein Kurs über erweiterte Rechengesetze wie das Potenzgesetz und das Wurzelgesetz.', 1),
       (9, 'Rechengesetze III', 'user', '../img/quarder.png',
        'Ein Kurs über Logarithmengesetze und besondere Regeln der Mathematik.', 1);

INSERT INTO KAPITEL (ID, KURS_ID, DEFINITION)
VALUES (1, 1, 'Grundbegriffe der Geometrie: Punkt, Linie, Ebene'),
       (2, 1, 'Winkel und deren Messung'),
       (3, 2, 'Transformationen: Translation, Rotation, Spiegelung'),
       (4, 2, 'Symmetrie und Kongruenz'),
       (5, 3, 'Vektorgeometrie: Vektoren, Skalare und Operationen'),
       (6, 3, 'Geraden und Ebenen im Raum');

INSERT INTO KAPITEL (ID, KURS_ID, DEFINITION)
VALUES (7, 4, 'Die Menge der natürlichen Zahlen (ℕ)'),
       (8, 4, 'Die Menge der ganzen Zahlen (ℤ)'),
       (9, 4, 'Die Menge der rationalen Zahlen (ℚ)'),
       (10, 5, 'Die Menge der irrationalen Zahlen'),
       (11, 5, 'Die Menge der reellen Zahlen (ℝ)'),
       (12, 6, 'Die Menge der komplexen Zahlen (ℂ)'),
       (13, 6, 'Transzendente Zahlen');

INSERT INTO KAPITEL (ID, KURS_ID, DEFINITION)
VALUES (14, 7, 'Kommutativgesetz'),
       (15, 7, 'Assoziativgesetz'),
       (16, 7, 'Distributivgesetz'),
       (17, 8, 'Potenzgesetze'),
       (18, 8, 'Wurzelgesetze'),
       (19, 9, 'Logarithmengesetze'),
       (20, 9, 'Besondere Regeln: Null und Eins');

INSERT INTO ERKLAERUNGEN (KAPITEL_ID, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (1, 'Erklärung zur Definition von Punkten und Linien',
        'Ein Punkt hat keine Ausdehnung und dient als Position. Eine Linie ist eine gerade, unendlich lange Verbindung von Punkten.',
        '../img/aufgaben/gerade.png'),
       (2, 'Erklärung zu Winkeln',
        'Ein Winkel wird durch zwei Linien definiert, die sich in einem Punkt schneiden. Der Abstand zwischen diesen Linien wird in Grad gemessen.',
        ''),
       (3, 'Grundlagen der geometrischen Transformationen',
        'Eine Transformation beschreibt die Bewegung oder Änderung einer Figur im Raum, ohne deren Form zu verändern.',
        ''),
       (4, 'Was sind symmetrische Figuren?',
        'Eine Figur ist symmetrisch, wenn sie durch eine Spiegelung an einer Linie oder einer Rotation um einen Punkt auf sich selbst abgebildet werden kann.',
        ''),
       (5, 'Einführung in die Vektorrechnung',
        'Ein Vektor repräsentiert eine gerichtete Größe im Raum, definiert durch eine Richtung und eine Länge. Operationen wie Addition und Skalarmultiplikation ermöglichen die Manipulation von Vektoren.',
        ''),
       (6, 'Parametergleichung einer Geraden',
        'Eine Gerade im Raum wird durch einen Stützpunkt und einen Richtungsvektor definiert. Die Parametergleichung lautet: g: r(t) = p + t * d, wobei p der Stützpunkt und d der Richtungsvektor ist.',
        '');


INSERT INTO ERKLAERUNGEN (KAPITEL_ID, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (7, 'Definition natürlicher Zahlen',
        'Die natürlichen Zahlen (ℕ) umfassen alle positiven ganzen Zahlen, beginnend bei 1. Manche Definitionen schließen die 0 mit ein: ℕ = {1, 2, 3, ...} oder ℕ₀ = {0, 1, 2, ...}.',
        ''),
       (8, 'Definition ganzer Zahlen',
        'Die ganzen Zahlen (ℤ) umfassen die natürlichen Zahlen, ihre negativen Gegenzahlen und die Null: ℤ = {..., -3, -2, -1, 0, 1, 2, 3, ...}.',
        ''),
       (9, 'Definition rationaler Zahlen',
        'Rationale Zahlen (ℚ) sind alle Zahlen, die als Bruch geschrieben werden können, wobei der Zähler und der Nenner ganze Zahlen sind und der Nenner nicht null ist: ℚ = {p/q | p, q ∈ ℤ, q ≠ 0}.',
        ''),
       (10, 'Definition irrationaler Zahlen',
        'Irrationale Zahlen können nicht als Bruch dargestellt werden. Sie haben unendliche, nicht periodische Dezimaldarstellungen. Beispiele sind √2 und π.',
        ''),
       (11, 'Definition reeller Zahlen',
        'Die Menge der reellen Zahlen umfasst alle rationalen und irrationalen Zahlen. Sie kann als die Menge aller Zahlen auf der Zahlengeraden beschrieben werden.',
        ''),
       (12, 'Definition komplexer Zahlen',
        'Komplexe Zahlen haben die Form z = a + bi, wobei a und b reelle Zahlen sind und i die imaginäre Einheit ist, definiert durch i² = -1.',
        ''),
       (13, 'Definition transzendenter Zahlen',
        'Transzendente Zahlen sind nicht algebraisch, das heißt, sie sind keine Lösung einer Polynomgleichung mit ganzzahligen Koeffizienten. Beispiele sind π und e.',
        '');

INSERT INTO ERKLAERUNGEN (KAPITEL_ID, HEADER, ERKLAERUNG, IMG_SRC)
VALUES (14, 'Was besagt das Kommutativgesetz?',
        'Das Kommutativgesetz besagt, dass die Reihenfolge der Operanden bei Addition und Multiplikation vertauscht werden kann, ohne das Ergebnis zu ändern: a + b = b + a und a × b = b × a.',
        ''),
       (15, 'Was besagt das Assoziativgesetz?',
        'Das Assoziativgesetz besagt, dass bei Addition und Multiplikation die Klammerung der Operanden keine Rolle spielt: (a + b) + c = a + (b + c) und (a × b) × c = a × (b × c).',
        ''),
       (16, 'Was besagt das Distributivgesetz?',
        'Das Distributivgesetz verknüpft Multiplikation mit Addition: a × (b + c) = (a × b) + (a × c). Es zeigt, dass eine Multiplikation über eine Summe "verteilt" werden kann.',
        ''),
       (17, 'Was sind Potenzgesetze?',
        'Potenzgesetze beschreiben Regeln für den Umgang mit Potenzen. Beispiele: a^m × a^n = a^(m+n), (a^m)^n = a^(m×n), und a^m / a^n = a^(m−n) für a ≠ 0.',
        ''),
       (18, 'Was sind Wurzelgesetze?',
        'Wurzelgesetze beschreiben den Umgang mit Wurzeln. Beispiele: √(a × b) = √a × √b, √(a / b) = √a / √b (für b ≠ 0), und (√a)^2 = a.',
        ''),
       (19, 'Was sind Logarithmengesetze?',
        'Logarithmengesetze beschreiben Regeln für den Umgang mit Logarithmen. Beispiele: log(a × b) = log(a) + log(b), log(a / b) = log(a) − log(b), und log(a^n) = n × log(a).',
        ''),
       (20, 'Wie wirken Null und Eins in Rechnungen?',
        'Null und Eins haben besondere Eigenschaften: a × 0 = 0, a + 0 = a, a × 1 = a, und a^0 = 1 (für a ≠ 0).', '');


INSERT INTO AUFGABEN (KAPITEL_ID, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (1, 'Zeichne zwei Punkte A (2, 3) und B (6, 3) und verbinde sie mit einer Linie.',
        'Nutze ein Lineal, um die Linie gerade zu ziehen.', ''),
       (2,
        'Zeichne zwei Linien, die sich im Punkt O (0, 0) schneiden. Wähle auf der ersten Linie die Punkte A (4, 0) und B (-4, 0). Auf der zweiten Linie wähle die Punkte C (0, 5) und D (0, -5). Miss den Winkel ∠AOC mit einem Geodreieck.',
        'Achte darauf, das Geodreieck genau am Punkt O (0, 0) auszurichten und die Linien präzise zu zeichnen.',
        '../img/aufgaben/winkel.png'),
       (3,
        'Verschiebe das Dreieck mit den Punkten A (1, 1), B (4, 1) und C (2, 3) um den Vektor (3, 2). Zeichne das resultierende Dreieck.',
        'Addiere den Vektor (3, 2) zu jedem Punkt des Dreiecks.', ''),
       (4,
        'Zeichne ein Quadrat mit den Eckpunkten A (0, 0), B (4, 0), C (4, 4), und D (0, 4). Spiegele das Quadrat an der Linie x = 2.',
        'Finde zuerst die Spiegelpunkte, indem du den Abstand zur Spiegelachse berechnest.', ''),
       (5, 'Berechne die Summe der Vektoren a = (2, 3) und b = (-1, 4).',
        'Addiere die jeweiligen Komponenten der Vektoren.', ''),
       (6,
        'Gegeben sei der Punkt P (1, 2, 3) und der Richtungsvektor d = (2, -1, 1). Schreibe die Parametergleichung der Geraden g.',
        'Verwende die Formel r(t) = p + t * d.', '');

INSERT INTO AUFGABEN (KAPITEL_ID, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (7, 'Schreibe die ersten fünf natürlichen Zahlen auf.', 'Denke daran, dass sie bei 1 beginnen.', ''),
       (7, 'Welche Zahl ist die kleinste natürliche Zahl?', 'Überlege, ob die Null dazugehört.', ''),
       (8, 'Gib fünf aufeinanderfolgende ganze Zahlen an, die sowohl positive als auch negative Zahlen enthalten.',
        'Beginne bei -2.', ''),
       (8, 'Ist die Zahl -7 eine natürliche Zahl oder eine ganze Zahl?',
        'Denke an die Definition der natürlichen Zahlen.', ''),
       (9, 'Schreibe drei Beispiele für rationale Zahlen auf.', 'Denke an Brüche wie 1/2 oder 3/4.', ''),
       (9, 'Ist die Zahl 0.75 eine rationale Zahl?', 'Überlege, ob sie als Bruch dargestellt werden kann.', ''),
       (10, 'Gib ein Beispiel für eine irrationale Zahl an.', 'Denke an Wurzeln oder bekannte Konstanten wie π.', ''),
       (10, 'Kann die Zahl 1.414213... als Bruch dargestellt werden?',
        'Überlege, ob die Dezimaldarstellung periodisch ist.', ''),
       (11, 'Gib drei Beispiele für reelle Zahlen an.', 'Dazu gehören rationale und irrationale Zahlen.', ''),
       (11, 'Ist die Zahl -√7 eine reelle Zahl?', 'Überlege, ob sie auf der Zahlengeraden liegt.', ''),
       (12, 'Schreibe eine komplexe Zahl auf, bei der der Realteil 3 und der Imaginärteil 4 ist.',
        'Verwende die Form z = a + bi.', ''),
       (12, 'Berechne das Quadrat der imaginären Einheit i.', 'Nutze die Definition von i.', ''),
       (13, 'Gib zwei bekannte transzendente Zahlen an.', 'Denke an mathematische Konstanten.', ''),
       (13, 'Ist die Zahl √2 transzendent?', 'Überlege, ob sie Lösung einer Polynomgleichung ist.', '');

INSERT INTO AUFGABEN (KAPITEL_ID, AUFGABENSTELLUNG, TIPP, IMG_SRC)
VALUES (14, 'Überprüfe das Kommutativgesetz für die Addition: Berechne 3 + 5 und 5 + 3.',
        'Addiere die Zahlen und vergleiche die Ergebnisse.', ''),
       (14, 'Überprüfe das Kommutativgesetz für die Multiplikation: Berechne 4 × 7 und 7 × 4.',
        'Multipliziere die Zahlen in beiden Reihenfolgen.', ''),
       (15, 'Überprüfe das Assoziativgesetz für die Addition: Berechne (2 + 3) + 4 und 2 + (3 + 4).',
        'Berechne zuerst den Inhalt der Klammern und addiere dann weiter.', ''),
       (15, 'Überprüfe das Assoziativgesetz für die Multiplikation: Berechne (2 × 3) × 4 und 2 × (3 × 4).',
        'Berechne zuerst den Inhalt der Klammern und multipliziere dann weiter.', ''),
       (16, 'Überprüfe das Distributivgesetz: Berechne 3 × (4 + 5) und (3 × 4) + (3 × 5).',
        'Berechne zunächst die Klammer und multipliziere, dann verteile die Multiplikation auf die Summanden.', ''),
       (16, 'Überprüfe das Distributivgesetz: Berechne 2 × (6 + 7) und (2 × 6) + (2 × 7).',
        'Verteile die Multiplikation auf die Zahlen in der Klammer.', ''),
       (17, 'Berechne 2^3 × 2^4 nach dem Potenzgesetz.', 'Addiere die Exponenten.', ''),
       (17, 'Berechne (3^2)^3 nach dem Potenzgesetz.', 'Multipliziere die Exponenten.', ''),
       (18, 'Berechne √(16 × 9) und vergleiche es mit √16 × √9.',
        'Berechne beide Werte separat und vergleiche die Ergebnisse.', ''),
       (18, 'Berechne √(25 / 4) und vergleiche es mit √25 / √4.', 'Teile zunächst die Wurzeln auf.', ''),
       (19, 'Berechne log(10 × 100) mithilfe der Logarithmengesetze.',
        'Zerlege die Multiplikation in einzelne Logarithmen.', ''),
       (19, 'Berechne log(100 / 10) mithilfe der Logarithmengesetze.', 'Nutze die Regel für Divisionen.', ''),
       (20, 'Berechne 7 × 0 und 7^0.', 'Nutze die Eigenschaften von Null und Eins.', ''),
       (20, 'Berechne 12 + 0 und 12 × 1.', 'Beachte, wie sich Null und Eins auswirken.', '');


INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (1, '[1, 2, 3, 4, 5]'),
       (2, '[1]'), -- oder [0], wenn ℕ₀ definiert ist
       (3, '[-2, -1, 0, 1, 2]'),
       (4, '["ganze Zahl"]'),
       (5, '["1/2", "3/4", "-5/2"]'),
       (6, '["Ja"]'),
       (7, '["√2"]'),
       (8, '["Nein"]'),
       (9, '["1", "√3", "π"]'),
       (10, '["Ja"]'),
       (11, '["3 + 4i"]'),
       (12, '["-1"]'),
       (13, '["π", "e"]'),
       (14, '["Nein"]');

INSERT INTO LOESUNGEN (AUFGABE_ID, LOESUNG)
VALUES (15, '[8, 8]'),
       (16, '[28, 28]'),
       (17, '[9, 9]'),
       (18, '[24, 24]'),
       (19, '[27, 27]'),
       (20, '[26, 26]'),
       (21, '[128]'),
       (22, '[729]'),
       (23, '[12, 12]'),
       (24, '[2.5, 2.5]'),
       (25, '[3]'),
       (26, '[1]'),
       (27, '[0, 1]'),
       (28, '[12, 12]');