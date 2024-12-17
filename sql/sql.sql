-- Erstellen der Datenbank
DROP DATABASE IF EXISTS SchulDB;
CREATE DATABASE SchulDB;

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
