--  Création de la base de données
DROP DATABASE IF EXISTS MaBagnole;
CREATE DATABASE MaBagnole;
USE MaBagnole;

--_____________(MaBagnole)__________________--


--  Table : users

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

--  Table : categories

CREATE TABLE categories (
    idCategorie INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    icone VARCHAR(50) DEFAULT 'token',
    description VARCHAR(250)
)  

--  Table : voitures

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

--  Table : reservations

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
); 

ALTER Table reservations ADD COLUMN totalPrix DECIMAL(10,2);

--  Table : options
 
CREATE TABLE options (
    idOption INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL 
)  

--  Table : option_reservation

CREATE TABLE option_reservation (
    idOptionReservation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idReservation INT NOT NULL,
    idOption INT NOT NULL,
    FOREIGN KEY (idReservation) REFERENCES reservations(idReservation) ON DELETE CASCADE,
    FOREIGN KEY (idOption) REFERENCES options(idOption) ON DELETE CASCADE
)  

--  Table: Avis 

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
);

--  Table: Favoris

CREATE TABLE favoris (
    idFavoris INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idClient INT NOT NULL,
    idV INT NOT NULL,
    FOREIGN KEY (idClient) REFERENCES users(idUser) ON DELETE CASCADE,
    FOREIGN KEY (idV) REFERENCES voitures(idV) ON DELETE CASCADE
)  

--  Table: ReagirAvis 

CREATE TABLE reagir_avis (
    idReagirAvis INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idAvis INT NOT NULL,
    idClient INT NOT NULL,
    typeReaction ENUM('like', 'dislike') NOT NULL,  
    FOREIGN KEY (idAvis) REFERENCES avis(idAvis) ON DELETE CASCADE,
    FOREIGN KEY (idClient) REFERENCES users(idUser) ON DELETE CASCADE
);


--  View : ListeVehicules

CREATE OR REPLACE VIEW ListeVehicules AS
SELECT 
    v.*, 
    c.titre AS category_name
FROM voitures v 
LEFT JOIN categories c ON v.idC = c.idCategorie;


--  View : Pour une suel vihicule
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
--  PROCEDURE : Pour Ajoute un Reservation 
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

USE MaBagnole;

DROP TABLE IF EXISTS themes

--  Table : themes

CREATE TABLE themes (
    idTheme INT PRIMARY KEY AUTO_INCREMENT,
    nomTheme VARCHAR(100) NOT NULL,
    description TEXT,
    imageTheme VARCHAR(255) 
);

ALTER TABLE themes 
CHANGE iconTheme iconeTheme varchar(50);

--  Table : articles

CREATE TABLE articles (
    idArticle INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    imageArticle VARCHAR(255), 
    videoArticle VARCHAR(255),  
    dateCreation DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'published', 'rejected') DEFAULT 'pending',
    idTheme INT NOT NULL,
    idUser INT NOT NULL, 
    FOREIGN KEY (idTheme) REFERENCES themes(idTheme) ON DELETE CASCADE,
    FOREIGN KEY (idUser) REFERENCES users(idUser) ON DELETE CASCADE
);
 
 --  Table : tags
CREATE TABLE tags (
    idTag INT PRIMARY KEY AUTO_INCREMENT,
    nomTag VARCHAR(50) NOT NULL UNIQUE
);
 
 --  Table : article_tags

CREATE TABLE article_tags (
    idArticle INT NOT NULL,
    idTag INT NOT NULL,
    PRIMARY KEY (idArticle, idTag),
    FOREIGN KEY (idArticle) REFERENCES articles(idArticle) ON DELETE CASCADE,
    FOREIGN KEY (idTag) REFERENCES tags(idTag) ON DELETE CASCADE
);

 --  Table : comments
CREATE TABLE comments (
    idComment INT PRIMARY KEY AUTO_INCREMENT,
    contenu TEXT NOT NULL,
    dateCommentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active', 'hidden') DEFAULT 'active',  
    idArticle INT NOT NULL,
    idUser INT NOT NULL,
    FOREIGN KEY (idArticle) REFERENCES articles(idArticle) ON DELETE CASCADE,
    FOREIGN KEY (idUser) REFERENCES users(idUser) ON DELETE CASCADE
);



--  Table : article_favoris

CREATE TABLE article_favoris (
    idUser INT NOT NULL,
    idArticle INT NOT NULL,
    PRIMARY KEY (idUser, idArticle),
    FOREIGN KEY (idUser) REFERENCES users(idUser) ON DELETE CASCADE,
    FOREIGN KEY (idArticle) REFERENCES articles(idArticle) ON DELETE CASCADE
);

--_-_-__-_-__-_-__-_-__-_-__-_-___the end ___-_-__-_-__-_-__-_-__-_-__-_-__-_--

