-- Erstellen der Datenbank
CREATE DATABASE IF NOT EXISTS SchulDB;

-- 2. Tabelle für users-Informationen
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    passwort VARCHAR(255) NOT NULL, -- Passwort sollte gehashed sein
    rolle ENUM('schüler', 'lehrer', 'eltern', 'admin') NOT NULL,
    vorname VARCHAR(50) NOT NULL,
    nachname VARCHAR(50) NOT NULL,
    geburtsdatum DATE NOT NULL,
    adresse VARCHAR(100) NOT NULL
);

INSERT INTO USERS(EMAIL, PASSWORT, ROLLE, VORNAME, NACHNAME, GEBURTSDATUM, ADRESSE) VALUE ('admin@mail.de','$2y$10$qMPOugy6pREJxH5d51mbMe62luoMC7iSXhy/kOXVl4jo90LoC.tmK','admin','admin','admin','2001-12-05','test');

CREATE TABLE nachrichten(
    id INT PRIMARY KEY AUTO_INCREMENT,
    topic TEXT,
    sender varchar(50) NOT NULL,
    recipient varchar(50) NOT NULL,
    date DATETIME NOT NULL,
    message TEXT
);

CREATE TABLE kursmitglieder(
    kurs_id INT,
    user_email varchar(50),
    FOREIGN KEY (user_email) REFERENCES users(email)
                           ON DELETE CASCADE
                           ON UPDATE CASCADE
);

/*

GRANT SELECT, INSERT, UPDATE, DELETE ON SchulDB.users TO 'username'@'localhost' IDENTIFIED BY 'user_password';
FLUSH PRIVILEGES;


*/