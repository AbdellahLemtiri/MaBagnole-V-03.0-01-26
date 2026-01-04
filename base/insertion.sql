
USE MaBagnole;
-- . INSERTION DES CATEGORIES 

INSERT INTO categories (titre, description, icone) VALUES 
('Economique', 'Voitures compactes, idéales pour la ville.', 'directions_car'),
('Luxe', 'Berlines de prestige pour un confort optimal.', 'stars'),
('SUV', 'Véhicules tout-terrain et familiaux.', 'terrain'),
('Sport', 'Voitures puissantes pour les amateurs de vitesse.', 'speed'),
('Utilitaire', 'Fourgonnettes pour le transport de marchandises.', 'local_shipping'),
('Cabriolet', 'Voitures décapotables pour profiter du soleil.', 'wb_sunny'),
('Hybride', 'Véhicules écologiques avec moteur mixte.', 'ev_station'),
('Electrique', '100% électrique, zéro émission.', 'bolt'),
('Monospace', 'Grandes voitures pour plus de 7 passagers.', 'groups'),
('Compacte', 'Équilibre parfait entre confort et consommation.', 'commute');
-- 2. INSERTION DES USERS (10)

INSERT INTO users (name, LastName, phone, email, password, role, status) VALUES 
('Anas', 'Admin', '0600112233', 'admin@mabagnole.com', 'password123', 'admin', '1'),
('Amine', 'Ben', '0644556677', 'amine@gmail.com', 'password123', 'client', '1'),
('Sami', 'Nasiri', '0611223344', 'sami@gmail.com', 'password123', 'client', '1'),
('Yassine', 'Rami', '0622334455', 'yassine@gmail.com', 'password123', 'client', '1'),
('Laila', 'Hassani', '0633445566', 'laila@gmail.com', 'password123', 'client', '1'),
('Omar', 'Tazi', '0655667788', 'omar@gmail.com', 'password123', 'client', '1'),
('Sara', 'Moudni', '0666778899', 'sara@gmail.com', 'password123', 'client', '1'),
('Hassan', 'Alami', '0677889900', 'hassan@gmail.com', 'password123', 'client', '0'),
('Khadija', 'Bennani', '0688990011', 'khadija@gmail.com', 'password123', 'client', '1'),
('Mehdi', 'Zaki', '0699001122', 'mehdi@gmail.com', 'password123', 'client', '1');

-- 3. INSERTION DES VOITURES 
INSERT INTO voitures (marque, modele, matricule, image, boite, carburant, prixJr, idC, places, status) VALUES 
('Dacia', 'Logan', '12345-A-6', 'https://images.remote.com/dacia-logan.jpg', 'manuelle', 'diesel', 250.00, 1, 5, '1'),
('Mercedes', 'Classe C', '7890-B-33', 'https://images.remote.com/merc-c.jpg', 'automatique', 'essence', 1200.00, 2, 5, '1'),
('Range Rover', 'Velar', '5566-D-1', 'https://images.remote.com/velar.jpg', 'automatique', 'hybride', 1500.00, 3, 5, '1'),
('Porsche', '911 Carrera', '911-S-8', 'https://images.remote.com/porsche911.jpg', 'automatique', 'essence', 3500.00, 4, 2, '1'),
('Renault', 'Master', '44332-H-5', 'https://images.remote.com/renault-master.jpg', 'manuelle', 'diesel', 500.00, 5, 3, '1'),
('BMW', 'Z4', '7788-Z-4', 'https://images.remote.com/bmw-z4.jpg', 'automatique', 'essence', 1800.00, 6, 2, '1'),
('Toyota', 'Corolla', '99110-T-12', 'https://images.remote.com/corolla-hyb.jpg', 'automatique', 'hybride', 450.00, 7, 5, '1'),
('Tesla', 'Model 3', '1010-E-9', 'https://images.remote.com/tesla3.jpg', 'automatique', 'electrique', 1300.00, 8, 5, '1'),
('VW', 'Touran', '55443-V-2', 'https://images.remote.com/touran.jpg', 'manuelle', 'diesel', 600.00, 9, 7, '1'),
('Golf', '8', '88888-G-8', 'https://images.remote.com/golf8.jpg', 'automatique', 'diesel', 550.00, 10, 5, '1');

-- 4. INSERTION DES OPTIONS 
INSERT INTO options (titre, description, prix) VALUES 
('Siège Bébé', 'Sécurité enfant.', 50.00),
('GPS', 'Navigation satellite.', 30.00),
('Deuxième Conducteur', 'Assurance supp.', 100.00),
('Wifi', 'Internet illimité.', 40.00),
('Plein Carburant', 'Retour réservoir vide.', 600.00),
('Assurance Premium', 'Zéro franchise.', 200.00),
('Porte-vélos', 'Pour 2 vélos.', 80.00),
('Chaînes Neige', 'Pour montagne.', 70.00),
('Glacière', 'Électrique 12V.', 25.00),
('Nettoyage', 'Forfait retour sale.', 150.00);

-- 5. INSERTION DES RESERVATIONS 
INSERT INTO reservations (dateDebut, dateFin, lieuChange, status, idVoiture, idUser) VALUES 
('2024-05-01', '2024-05-05', 'Aéroport Casa', 'terminee', 1, 2),
('2024-05-10', '2024-05-15', 'Gare Rabat', 'terminee', 2, 3),
('2024-06-01', '2024-06-03', 'Aéroport Marrakech', 'en cours', 3, 4),
('2024-06-05', '2024-06-10', 'Centre Ville', 'en cours', 4, 5),
('2024-07-01', '2024-07-07', 'Aéroport Tanger', 'en cours', 5, 6),
('2024-08-01', '2024-08-05', 'Hôtel Agadir', 'en cours', 6, 7),
('2024-05-20', '2024-05-22', 'Aéroport Casa', 'annulee', 1, 8),
('2024-09-01', '2024-09-10', 'Gare Fès', 'en cours', 7, 9),
('2024-10-01', '2024-10-05', 'Aéroport Casa', 'en cours', 8, 10),
('2024-11-01', '2024-11-03', 'Centre Rabat', 'en cours', 9, 2);

-- 6. INSERTION DES OPTIONS_RESERVATION (Rbet les options m3a les reservations)
INSERT INTO option_reservation (idReservation, idOption) VALUES 
(1, 1), (1, 2), (2, 3), (3, 1), (4, 5), 
(5, 6), (6, 2), (8, 4), (9, 7), (10, 8);

-- 7. INSERTION DES AVIS (Reviews)
INSERT INTO avis (commentaire, note, status, idReservation, idClient) VALUES 
('Service excellent, voiture très propre.', 5, '1', 1, 2),
('Un peu de retard pour la livraison.', 3, '1', 2, 3),
('Voiture de luxe incroyable, je recommande.', 5, '1', 3, 4),
('Prix correct et personnel sympa.', 4, '1', 4, 5),
('La clim ne marchait pas très bien.', 2, '1', 5, 6),
('Parfait pour un weekend en famille.', 5, '1', 6, 7),
('Rien à dire, 10/10.', 5, '1', 8, 9),
('Expérience correcte sans plus.', 3, '1', 9, 10),
('Super voiture, très économique.', 4, '1', 10, 2),
('Annulation rapide et sans frais, merci.', 5, '1', 7, 8);

-- 8. INSERTION DES FAVORIS
INSERT INTO favoris (idClient, idV) VALUES 
(2, 1), (2, 2), (3, 3), (4, 4), (5, 5), 
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10);

-- 9. INSERTION DES REACTIONS SUR AVIS (Likes/Dislikes)
INSERT INTO reagir_avis (idAvis, idClient, typeReaction) VALUES 
(1, 3, 'like'), (1, 4, 'like'), (2, 2, 'dislike'), 
(3, 5, 'like'), (4, 6, 'like'), (5, 7, 'dislike'), 
(6, 8, 'like'), (7, 2, 'like'), (8, 3, 'like'), (9, 4, 'like');