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
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    passwort VARCHAR(255) NOT NULL, -- Passwort sollte gehashed sein
    rolle ENUM('schüler', 'lehrer', 'eltern', 'admin') NOT NULL,
    vorname VARCHAR(50) NOT NULL,
    nachname VARCHAR(50) NOT NULL,
    geburtsdatum DATE NOT NULL
);

-- 3. Tabelle für Übungen
CREATE TABLE Uebungen (
    übungs_id INT PRIMARY KEY AUTO_INCREMENT,
    fach VARCHAR(50) NOT NULL,
    thema VARCHAR(100) NOT NULL,
    erstellt_von INT, -- Verweis auf Lehrer in der User-Tabelle
    FOREIGN KEY (erstellt_von) REFERENCES users(user_id) ON DELETE SET NULL
);

-- 4. Tabelle für Aufgaben
CREATE TABLE Aufgaben (
    aufgabe_id INT PRIMARY KEY AUTO_INCREMENT,
    aufgaben_text TEXT NOT NULL,
    lösung TEXT NOT NULL,
    übungs_id INT, -- Verweis auf Übung
    FOREIGN KEY (übungs_id) REFERENCES Uebungen(übungs_id) ON DELETE CASCADE
);