USE MaBagnole;
-- . INSERTION DES CATEGORIES

INSERT INTO
    categories (titre, description, icone)
VALUES (
        'Economique',
        'Voitures compactes, idéales pour la ville.',
        'directions_car'
    ),
    (
        'Luxe',
        'Berlines de prestige pour un confort optimal.',
        'stars'
    ),
    (
        'SUV',
        'Véhicules tout-terrain et familiaux.',
        'terrain'
    ),
    (
        'Sport',
        'Voitures puissantes pour les amateurs de vitesse.',
        'speed'
    ),
    (
        'Utilitaire',
        'Fourgonnettes pour le transport de marchandises.',
        'local_shipping'
    ),
    (
        'Cabriolet',
        'Voitures décapotables pour profiter du soleil.',
        'wb_sunny'
    ),
    (
        'Hybride',
        'Véhicules écologiques avec moteur mixte.',
        'ev_station'
    ),
    (
        'Electrique',
        '200% électrique, zéro émission.',
        'bolt'
    ),
    (
        'Monospace',
        'Grandes voitures pour plus de 7 passagers.',
        'groups'
    ),
    (
        'Compacte',
        'Équilibre parfait entre confort et consommation.',
        'commute'
    );
-- 2. INSERTION DES USERS (20)

INSERT INTO
    users (
        name,
        LastName,
        phone,
        email,
        password,
        role,
        status
    )
VALUES (
        'Anas',
        'Admin',
        '0600212233',
        'admin@mabagnole.com',
        'password123',
        'admin',
        '1'
    ),
    (
        'Amine',
        'Ben',
        '0644556677',
        'amine@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Sami',
        'Nasiri',
        '0611223344',
        'sami@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Yassine',
        'Rami',
        '0622334455',
        'yassine@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Laila',
        'Hassani',
        '0633445566',
        'laila@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Omar',
        'Tazi',
        '0655667788',
        'omar@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Sara',
        'Moudni',
        '0666778899',
        'sara@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Hassan',
        'Alami',
        '0677889900',
        'hassan@gmail.com',
        'password123',
        'client',
        '0'
    ),
    (
        'Khadija',
        'Bennani',
        '0688990011',
        'khadija@gmail.com',
        'password123',
        'client',
        '1'
    ),
    (
        'Mehdi',
        'Zaki',
        '0699001122',
        'mehdi@gmail.com',
        'password123',
        'client',
        '1'
    );

-- 3. INSERTION DES VOITURES
INSERT INTO
    voitures (
        marque,
        modele,
        matricule,
        image,
        boite,
        carburant,
        prixJr,
        idC,
        places,
        status
    )
VALUES (
        'Dacia',
        'Logan',
        '12345-A-6',
        'https://images.remote.com/dacia-logan.jpg',
        'manuelle',
        'diesel',
        250.00,
        1,
        5,
        '1'
    ),
    (
        'Mercedes',
        'Classe C',
        '7890-B-33',
        'https://images.remote.com/merc-c.jpg',
        'automatique',
        'essence',
        1200.00,
        2,
        5,
        '1'
    ),
    (
        'Range Rover',
        'Velar',
        '5566-D-1',
        'https://images.remote.com/velar.jpg',
        'automatique',
        'hybride',
        1500.00,
        3,
        5,
        '1'
    ),
    (
        'Porsche',
        '911 Carrera',
        '911-S-8',
        'https://images.remote.com/porsche911.jpg',
        'automatique',
        'essence',
        3500.00,
        4,
        2,
        '1'
    ),
    (
        'Renault',
        'Master',
        '44332-H-5',
        'https://images.remote.com/renault-master.jpg',
        'manuelle',
        'diesel',
        500.00,
        5,
        3,
        '1'
    ),
    (
        'BMW',
        'Z4',
        '7788-Z-4',
        'https://images.remote.com/bmw-z4.jpg',
        'automatique',
        'essence',
        1800.00,
        6,
        2,
        '1'
    ),
    (
        'Toyota',
        'Corolla',
        '99110-T-12',
        'https://images.remote.com/corolla-hyb.jpg',
        'automatique',
        'hybride',
        450.00,
        7,
        5,
        '1'
    ),
    (
        'Tesla',
        'Model 3',
        '1010-E-9',
        'https://images.remote.com/tesla3.jpg',
        'automatique',
        'electrique',
        1300.00,
        8,
        5,
        '1'
    ),
    (
        'VW',
        'Touran',
        '55443-V-2',
        'https://images.remote.com/touran.jpg',
        'manuelle',
        'diesel',
        600.00,
        9,
        7,
        '1'
    ),
    (
        'Golf',
        '8',
        '88888-G-8',
        'https://images.remote.com/golf8.jpg',
        'automatique',
        'diesel',
        550.00,
        10,
        5,
        '1'
    );

-- 4. INSERTION DES OPTIONS
INSERT INTO
    options (titre, description, prix)
VALUES (
        'Siège Bébé',
        'Sécurité enfant.',
        50.00
    ),
    (
        'GPS',
        'Navigation satellite.',
        30.00
    ),
    (
        'Deuxième Conducteur',
        'Assurance supp.',
        100.00
    ),
    (
        'Wifi',
        'Internet illimité.',
        40.00
    ),
    (
        'Plein Carburant',
        'Retour réservoir vide.',
        600.00
    ),
    (
        'Assurance Premium',
        'Zéro franchise.',
        200.00
    ),
    (
        'Porte-vélos',
        'Pour 2 vélos.',
        80.00
    ),
    (
        'Chaînes Neige',
        'Pour montagne.',
        70.00
    ),
    (
        'Glacière',
        'Électrique 12V.',
        25.00
    ),
    (
        'Nettoyage',
        'Forfait retour sale.',
        150.00
    );

-- 5. INSERTION DES RESERVATIONS
INSERT INTO
    reservations (
        dateDebut,
        dateFin,
        lieuChange,
        status,
        idVoiture,
        idUser
    )
VALUES (
        '2024-05-01',
        '2024-05-05',
        'Aéroport Casa',
        'terminee',
        1,
        2
    ),
    (
        '2024-05-10',
        '2024-05-15',
        'Gare Rabat',
        'terminee',
        2,
        3
    ),
    (
        '2024-06-01',
        '2024-06-03',
        'Aéroport Marrakech',
        'en cours',
        3,
        4
    ),
    (
        '2024-06-05',
        '2024-06-10',
        'Centre Ville',
        'en cours',
        4,
        5
    ),
    (
        '2024-07-01',
        '2024-07-07',
        'Aéroport Tanger',
        'en cours',
        5,
        6
    ),
    (
        '2024-08-01',
        '2024-08-05',
        'Hôtel Agadir',
        'en cours',
        6,
        7
    ),
    (
        '2024-05-20',
        '2024-05-22',
        'Aéroport Casa',
        'annulee',
        1,
        8
    ),
    (
        '2024-09-01',
        '2024-09-10',
        'Gare Fès',
        'en cours',
        7,
        9
    ),
    (
        '2024-10-01',
        '2024-10-05',
        'Aéroport Casa',
        'en cours',
        8,
        10
    ),
    (
        '2024-11-01',
        '2024-11-03',
        'Centre Rabat',
        'en cours',
        9,
        2
    );

-- 6. INSERTION DES OPTIONS_RESERVATION (Rbet les options m3a les reservations)
INSERT INTO
    option_reservation (idReservation, idOption)
VALUES (1, 1),
    (1, 2),
    (2, 3),
    (3, 1),
    (4, 5),
    (5, 6),
    (6, 2),
    (8, 4),
    (9, 7),
    (10, 8);

-- 7. INSERTION DES AVIS (Reviews)
INSERT INTO
    avis (
        commentaire,
        note,
        status,
        idReservation,
        idClient
    )
VALUES (
        'Service excellent, voiture très propre.',
        5,
        '1',
        1,
        2
    ),
    (
        'Un peu de retard pour la livraison.',
        3,
        '1',
        2,
        3
    ),
    (
        'Voiture de luxe incroyable, je recommande.',
        5,
        '1',
        3,
        4
    ),
    (
        'Prix correct et personnel sympa.',
        4,
        '1',
        4,
        5
    ),
    (
        'La clim ne marchait pas très bien.',
        2,
        '1',
        5,
        6
    ),
    (
        'Parfait pour un weekend en famille.',
        5,
        '1',
        6,
        7
    ),
    (
        'Rien à dire, 10/10.',
        5,
        '1',
        8,
        9
    ),
    (
        'Expérience correcte sans plus.',
        3,
        '1',
        9,
        10
    ),
    (
        'Super voiture, très économique.',
        4,
        '1',
        10,
        2
    ),
    (
        'Annulation rapide et sans frais, merci.',
        5,
        '1',
        7,
        8
    );

-- 8. INSERTION DES FAVORIS
INSERT INTO
    favoris (idClient, idV)
VALUES (2, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10);

-- 9. INSERTION DES REACTIONS SUR AVIS (Likes/Dislikes)
INSERT INTO
    reagir_avis (
        idAvis,
        idClient,
        typeReaction
    )
VALUES (1, 3, 'like'),
    (1, 4, 'like'),
    (2, 2, 'dislike'),
    (3, 5, 'like'),
    (4, 6, 'like'),
    (5, 7, 'dislike'),
    (6, 8, 'like'),
    (7, 2, 'like'),
    (8, 3, 'like'),
    (9, 4, 'like');

INSERT INTO
    themes (
        nomTheme,
        description,
        iconeTheme
    )
VALUES (
        'Moteurs et Mécanique',
        'Tout sur le fonctionnement interne des voitures.',
        'mecanique.jpg'
    ),
    (
        'Électrique et Hybride',
        'L''avenir de l''automobile et les nouvelles technologies.',
        'electrique.png'
    ),
    (
        'Entretien DIY',
        'Conseils pour réparer sa voiture soi-même.',
        'diy.jpg'
    ),
    (
        'Sport Automobile',
        'Actualités sur la F1, le Rallye et les circuits.',
        'sport.jpg'
    );

INSERT INTO
    tags (nomTag)
VALUES ('Turbo'),
    ('Batterie'),
    ('Occasion'),
    ('Luxe'),
    ('Sécurité'),
    ('Vitesse');

INSERT INTO
    articles (
        titre,
        contenu,
        imageArticle,
        idTheme,
        idUser,
        status
    )
VALUES (
        'Le guide du Turbo',
        'Le turbocompresseur permet d''augmenter la puissance...',
        'turbo_guide.jpg',
        1,
        1,
        'published'
    ),
    (
        'Tesla Model S en 2026',
        'Analyse des performances de la nouvelle version...',
        'tesla2026.jpg',
        2,
        1,
        'published'
    ),
    (
        'Changer ses plaquettes',
        'Tutoriel étape par étape pour freiner en sécurité.',
        'freins.jpg',
        3,
        2,
        'pending'
    );

INSERT INTO
    article_tags (idArticle, idTag)
VALUES (1, 1), -- Article 1 lié au Tag 1 (Turbo)
    (1, 6), -- Article 1 lié au Tag 6 (Vitesse)
    (2, 2);
-- Article 2 lié au Tag 2 (Batterie)

INSERT INTO
    comments (
        contenu,
        idArticle,
        idUser,
        status
    )
VALUES (
        'Super article, j''ai enfin compris le rôle du wastegate !',
        1,
        2,
        'active'
    ),
    (
        'Est-ce que l''autonomie est réelle sur ce modèle ?',
        2,
        1,
        'active'
    );

INSERT INTO
    article_favoris (idUser, idArticle)
VALUES (1, 1),
    (2, 1),
    (2, 2);

INSERT INTO
    themes (
        nomTheme,
        description,
        iconeTheme
    )
VALUES (
        'Voitures Électriques',
        'Koul ma t-3elleq b s-syarat l-kahraba\'iya u l-bi\'a',
        'electric_car'
    ),
    (
        'Maintenance & Réparation',
        'Nassa\'ih l-mikanik u kifach t-7afd 3la tounobiltek',
        'build'
    ),
    (
        'SUV & 4x4',
        'Syarat l-wa3ra u l-moughamarat f l-jbel',
        'terrain'
    ),
    (
        'Luxe & Sport',
        'Akher s-syarat l-fakhira u s-sari3a f l-3alam',
        'speed'
    ),
    (
        'Occasion',
        'Sticharat l-bi3 u l-chra f s-souq d l-mousta3mal',
        'sell'
    ),
    (
        'Motos & Scooters',
        'Akhbar d darrajat l-nariya u l-mowassafat dyalha',
        'two_wheeler'
    ),
    (
        'Poids Lourds',
        'Syarat l-chnit u l-kamiyounat l-kbar',
        'local_shipping'
    ),
    (
        'Accessoires',
        'Tajhizat d dakhil u d barra bach t-zayyen tomobile',
        'minor_crash'
    ),
    (
        'Sécurité Routière',
        'Qawanin s-sayr u nassa\'ih l-salama f l-triq',
        'traffic'
    ),
    (
        'Classiques',
        'S-syarat l-9dima u l-antika li 3ndha tarikh',
        'directions_car_filled'
    );

INSERT INTO
    articles (
        titre,
        contenu,
        imageArticle,
        videoArticle,
        status,
        idTheme,
        idUser
    )
VALUES (
        'Mustang Mach-E: L-khatawa l-oula',
        'Had s-syara l-kahraba\'iya b-dāt kat-ghiyyer l-nadra dial l-mousstahlik l-maghribi...',
        'mustang.jpg',
        NULL,
        'pending',
        32,
        2
    );

INSERT INTO
    articles (
        titre,
        contenu,
        imageArticle,
        videoArticle,
        status,
        idTheme,
        idUser
    )
VALUES (
        'Mustang Mach-E: L-khatawa l-oula',
        'Had s-syara l-kahraba\'iya b-dāt kat-ghiyyer l-nadra dial l-mousstahlik l-maghribi...',
        'mustang.jpg',
        NULL,
        'published',
        32,
        2
    ),
    (
        'Kifach t-beddel z-zit b-rassek',
        'Dars f l-mikanik l-basit bach t-7afd 3la l-moteur dialek u t-qtasat l-flouss...',
        'maintenance.jpg',
        'https://youtube.com/watch?v=123',
        'published',
        32,
        2
    ),
    (
        'Top 5 d s-syarat f l-jbel',
        'Ila knti kaddi r-randonnée, hadou huma s-syarat li ghadi i-nasbouk f l-maghrib...',
        'suv_top5.jpg',
        NULL,
        'published',
        32,
        2
    ),
    (
        'Ferrari Purosangue f Casa',
        'Awel marra kat-ban had l-ferrari l-jdida f ch-chawari3 dial l-dar l-bayda...',
        'ferrari.jpg',
        NULL,
        'published',
        33,
        2
    ),
    (
        'Souq l-kherda: Chnu khass t-red lih l-bal',
        'Nassa\'ih l-chra d s-syarat l-moussta3mala f s-souq d s-sebt wala l-7ed...',
        'market.jpg',
        NULL,
        'published',
        44,
        2
    ),
    (
        'TMAX vs Forza: Chkoun l-wa3er?',
        'Mouqarana kamla bin akbar jouj d s-scooters li m-7erkinn f l-maghrib...',
        'scooter_battle.jpg',
        'https://youtube.com/watch?v=456',
        'published',
        38,
        2
    ),
    (
        'Daf XF: L-wahch d l-triq',
        'Tajriba d l-qiyada l wa7ed men akbar l-kamiyounat dial ch-chnit...',
        'daf_truck.jpg',
        NULL,
        'published',
        34,
        2
    ),
    (
        'Ecrans CarPlay: Wach i-stahlo?',
        'Tahlil l l-ajhiza l-jdida li t-qder t-zidha f s-syara dialek l-qdima...',
        'carplay.jpg',
        NULL,
        'published',
        2,
        2
    ),
    (
        'Radar l-jdid u l-gharamat',
        'Kifach t-fada l-mousstachara d l-gharamat l-jdida dial l-amn l-watani...',
        'radar.jpg',
        NULL,
        'published',
        36,
        2
    ),
    (
        'Mercedes 290: L-idouda dial l-mgharba',
        '3lach mazal had s-syara kat-3teber men bin aktar s-syarat li s-bara f l-triq...',
        'mercedes290.jpg',
        NULL,
        'published',
        37,
        2
    );

SELECT a.*, t.nomTheme, t.iconeTheme, u.name, u.LastName, u.email
FROM
    articles a
    JOIN themes t ON a.idTheme = t.idTheme
    JOIN users u ON a.idUser = u.idUser
WHERE
    t.`idTheme` = 33

SELECT count(*) as count ,a.idClient,u.idUser 
            FROM avis a 
            INNER JOIN users u ON a.idClient = u.idUser




SELECT c.idComment, c.contenu, c.dateCommentaire, c.idUser, c.status, u.name, u.LastName FROM comments c JOIN users u ON c.idUser = u.idUser
                WHERE c.idArticle = 113 AND c.status = 'active' AND u.status = 1
                ORDER BY c.dateCommentaire DESC


ALTER TABLE avis ADD COLUMN idVoiture INT(11)

ALTER TABLE avis  ADD CONSTRAINT FOREIGN KEY (idVoiture) REFERENCES voitures(idV) 




SELECT a.* , u.name,u.`LastName`FROM avis a INNER join users u  on a.`idClient` = u.`idUser` INNER JOIN voitures v on a.`idVoiture`
 = v.`idV`


 ALTER TABLE themes 
CHANGE iconTheme iconeTheme varchar(50);
