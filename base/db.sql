-- 1. Création de la base de données
DROP DATABASE IF EXISTS MaBagnole;
CREATE DATABASE MaBagnole;
USE MaBagnole;

--_____________ 2. Table: User (Utilisateurs)_____________________________
CREATE TABLE users (                                                           
    idUser INT NOT NULL PRIMARY KEY AUTO_INCREMENT,                           
    name VARCHAR(50) NOT NULL,                                             
    LastName VARCHAR(50) NOT NULL,                                           
    phone VARCHAR(25) NOT NULL,                                               
    email VARCHAR(100) NOT NULL UNIQUE,                                       
    password VARCHAR(255) NOT NULL, 
    status ENUM('0','1') DEFAULT '1',
    role ENUM('admin','client') DEFAULT 'client'
)  


CREATE TABLE categories (
    idCategorie INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    icone VARCHAR(50) DEFAULT 'token',
    description VARCHAR(250)
)  


CREATE TABLE voitures (
    idV INT PRIMARY KEY AUTO_INCREMENT, 
    marque VARCHAR(60),
    modele VARCHAR(50),
    matricule VARCHAR(20) NOT NULL ,
    image VARCHAR(255) NOT NULL,
    boite ENUM('manuelle', 'automatique'),
    carburant ENUM('essence', 'diesel', 'electrique', 'hybride'),
    prixJr DECIMAL(10, 2) NOT NULL,
    idC INT NOT NULL,
    places INT NOT NULL,
   status ENUM('0', '1') DEFAULT '1', 
    FOREIGN KEY (idC) REFERENCES categories(idCategorie) ON DELETE CASCADE
)  


CREATE TABLE reservations (
    idReservation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    dateDebut DATE NOT NULL,
    dateFin DATE NOT NULL,
    lieuChange VARCHAR(255) NOT NULL,
    status ENUM('en cours', 'terminee', 'annulee') DEFAULT 'en cours',
    idVoiture INT NOT NULL,
    idUser INT NOT NULL,
    FOREIGN KEY (idVoiture) REFERENCES voitures(idV) ON DELETE CASCADE,
    FOREIGN KEY (idUser) REFERENCES users(idUser) ON DELETE CASCADE
) ; 


CREATE TABLE options (
    idOption INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL 
)  


CREATE TABLE option_reservation (
    idOptionReservation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idReservation INT NOT NULL,
    idOption INT NOT NULL,
    FOREIGN KEY (idReservation) REFERENCES reservations(idReservation) ON DELETE CASCADE,
    FOREIGN KEY (idOption) REFERENCES options(idOption) ON DELETE CASCADE
)  

-- 8. Table: Avis (Reviews)
CREATE TABLE avis (
    idAvis INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    commentaire VARCHAR(255) NOT NULL,
    note INT NOT NULL,
    datePublication DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('0', '1') DEFAULT '1',
    idReservation INT NOT NULL,
    idClient INT NOT NULL,
    FOREIGN KEY (idReservation) REFERENCES reservations(idReservation) ON DELETE CASCADE,
    FOREIGN KEY (idClient) REFERENCES users(idUser) ON DELETE CASCADE
) 

-- . Table: Favoris
CREATE TABLE favoris (
    idFavoris INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idClient INT NOT NULL,
    idV INT NOT NULL,
    FOREIGN KEY (idClient) REFERENCES users(idUser) ON DELETE CASCADE,
    FOREIGN KEY (idV) REFERENCES voitures(idV) ON DELETE CASCADE
)  

-- . Table: ReagirAvis (Likes/Dislikes sur les avis - Bonus)
CREATE TABLE reagir_avis (
    idReagirAvis INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idAvis INT NOT NULL,
    idClient INT NOT NULL,
    typeReaction ENUM('like', 'dislike') NOT NULL, -- Ajout pour savoir si c'est like ou dislike
    FOREIGN KEY (idAvis) REFERENCES avis(idAvis) ON DELETE CASCADE,
    FOREIGN KEY (idClient) REFERENCES users(idUser) ON DELETE CASCADE
);

CREATE OR REPLACE VIEW ListeVehicules AS
SELECT 
    v.*, 
    c.titre AS category_name
FROM voitures v 
LEFT JOIN categories c ON v.idC = c.idCategorie;


CREATE OR REPLACE VIEW uneVehicule AS
SELECT 
    v.*, 
    c.titre AS category_name
FROM voitures v 
LEFT JOIN categories c ON v.idC = c.idCategorie;

ALTER TABLE reservations 
ADD totalPrix DECIMAL(10, 2) NOT NULL AFTER status;
DROP PROCEDURE IF EXISTS AjouterReservation;

DELIMITER //

CREATE PROCEDURE AjouterReservation(
    IN p_dateDebut DATE,
    IN p_dateFin DATE,
    IN p_lieu VARCHAR(255),
    IN p_totalPrix DECIMAL(10, 2),  
    IN p_idVoiture INT,
    IN p_idUser INT
)
BEGIN
    INSERT INTO reservations (dateDebut, dateFin, lieuChange, totalPrix, status, idVoiture, idUser)
    VALUES (p_dateDebut, p_dateFin, p_lieu, p_totalPrix, 'en cours', p_idVoiture, p_idUser);
END //

DELIMITER ;

