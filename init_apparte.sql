-- Crée la base de données si elle n'existe pas
CREATE DATABASE IF NOT EXISTS apparte DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE apparte;

-- Table Client
CREATE TABLE IF NOT EXISTS Client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    isAdmin BOOLEAN DEFAULT FALSE
);

-- Table Logement
CREATE TABLE IF NOT EXISTS Logement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    capacite INT NOT NULL,
    superficie INT NOT NULL,
    description TEXT,
    typeLogement ENUM('Appartement', 'Maison', 'Chalet', 'Studio', 'Autre') NOT NULL,
    hasChauffage BOOLEAN DEFAULT FALSE,
    hasClimatisation BOOLEAN DEFAULT FALSE,
    hasBaignoire BOOLEAN DEFAULT FALSE,
    hasFourMicroOnde BOOLEAN DEFAULT FALSE,
    hasTelevision BOOLEAN DEFAULT FALSE,
    hasWifi BOOLEAN DEFAULT FALSE,
    hasLaveLinge BOOLEAN DEFAULT FALSE,
    hasLaveVaisselle BOOLEAN DEFAULT FALSE,
    hasAscenseur BOOLEAN DEFAULT FALSE,
    hasCheminée BOOLEAN DEFAULT FALSE,
    hasAnimauxAutorises BOOLEAN DEFAULT FALSE,
    hasBarbecue BOOLEAN DEFAULT FALSE,
    hasBalcon BOOLEAN DEFAULT FALSE,
    hasJardin BOOLEAN DEFAULT FALSE,
    hasTerrasse BOOLEAN DEFAULT FALSE,
    hasPiscine BOOLEAN DEFAULT FALSE,
    hasCave BOOLEAN DEFAULT FALSE,
    hasParking BOOLEAN DEFAULT FALSE,
    hasOther VARCHAR(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS Photo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logement_id INT NOT NULL,
    url VARCHAR(255) NOT NULL,
    isPrincipale BOOLEAN DEFAULT FALSE,
    ordre INT DEFAULT 0,
    FOREIGN KEY (logement_id) REFERENCES Logement(id) ON DELETE CASCADE
);

-- Table Annonce
CREATE TABLE IF NOT EXISTS Annonce (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    prixParSemaine DECIMAL(10,2) NOT NULL,
    proprietaire_id INT NOT NULL,
    logement_id INT NOT NULL,
    FOREIGN KEY (proprietaire_id) REFERENCES Client(id) ON DELETE CASCADE,
    FOREIGN KEY (logement_id) REFERENCES Logement(id) ON DELETE CASCADE
);

-- Table Reservation
CREATE TABLE IF NOT EXISTS Reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    logement_id INT NOT NULL,
    dateDebutSemaine DATE NOT NULL,
    nbSemaine INT NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Client(id) ON DELETE CASCADE,
    FOREIGN KEY (logement_id) REFERENCES Logement(id) ON DELETE CASCADE
);

-- Table Calendrier
CREATE TABLE IF NOT EXISTS Calendrier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logement_id INT NOT NULL,
    annee INT NOT NULL,
    numeroSemaine INT NOT NULL,
    estReserve BOOLEAN DEFAULT FALSE,
    UNIQUE (logement_id, annee, numeroSemaine),
    FOREIGN KEY (logement_id) REFERENCES Logement(id) ON DELETE CASCADE
);

-- Table Note (liée à une réservation)
CREATE TABLE IF NOT EXISTS Note (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    critere VARCHAR(100) NOT NULL,
    valeur INT CHECK (valeur BETWEEN 0 AND 5),
    FOREIGN KEY (reservation_id) REFERENCES Reservation(id) ON DELETE CASCADE
);

-- Table Tarif (lié à un logement)
CREATE TABLE IF NOT EXISTS Tarif (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logement_id INT NOT NULL,
    periode VARCHAR(100) NOT NULL,
    coefficient DECIMAL(4,2) NOT NULL DEFAULT 1.00,
    FOREIGN KEY (logement_id) REFERENCES Logement(id) ON DELETE CASCADE
);
