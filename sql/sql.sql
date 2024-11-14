/*
cd C:\xampp\mysql\bin
mysql -u root -p

SELECT * FROM users;
*/

-- Erstellen der Datenbank
DROP DATABASE IF EXISTS SchulDB;
CREATE DATABASE SchulDB;
USE SchulDB;

-- 2. Tabelle für users-Informationen
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    passwort VARCHAR(255) NOT NULL, -- Passwort sollte gehashed sein
    rolle ENUM('schüler', 'lehrer', 'eltern', 'admin') NOT NULL,
    vorname VARCHAR(50) NOT NULL,
    nachname VARCHAR(50) NOT NULL,
    geburtsdatum DATE NOT NULL,
    adresse VARCHAR(100) NOT NULL
);

-- 3. Tabelle für Übungen
CREATE TABLE uebungen (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fach VARCHAR(50) NOT NULL,
    thema VARCHAR(100) NOT NULL,
    users_id INT NOT NULL, -- Verweis auf Lehrer in der User-Tabelle
    FOREIGN KEY (users_id) REFERENCES users(id)
        ON DELETE CASCADE -- Wenn der Lehrer (user) gelöscht wird, werden auch alle zugehörigen Übungen gelöscht
        ON UPDATE CASCADE -- Wenn sich die 'user_id' eines Lehrers ändert, wird die entsprechende 'erstellt_von' ID in 'Uebungen' ebenfalls aktualisiert
);

-- 4. Tabelle für Aufgaben
CREATE TABLE aufgaben (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aufgaben_text TEXT NOT NULL,
    loesung TEXT NOT NULL,
    uebungs_id INT NOT NULL, -- Verweis auf Übung
    FOREIGN KEY (uebungs_id) REFERENCES uebungen(id)
        ON DELETE CASCADE -- Wenn eine Übung gelöscht wird, werden auch alle dazugehörigen Aufgaben gelöscht
        ON UPDATE CASCADE -- Wenn sich die 'übungs_id' einer Übung ändert, wird die entsprechende 'übungs_id' in 'Aufgaben' ebenfalls aktualisiert
);


/*

GRANT SELECT, INSERT, UPDATE, DELETE ON SchulDB.users TO 'username'@'localhost' IDENTIFIED BY 'user_password';
FLUSH PRIVILEGES;


*/