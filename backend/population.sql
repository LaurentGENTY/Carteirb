INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Yûgi','Muto','Heros11');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Yami','Yugi',NULL);
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Téa','Gardner',NULL);
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Joey','Wheeler','Jojo');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Seto','Kaiba',NULL);
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Ryô','Bakura','xxDarkSasukexx');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Pegasus','Crawford',NULL);

-- Cartes

-- yugi
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Magicien des ténèbres','Monstre','Ténèbres','Magicien');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Crâne invoqué','Monstre','Ténèbres','Démon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Gaïa Chevalier Implacable','Monstre','Terre','Guerrier');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Malédiction du dragon','Monstre','Ténèbres','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Insecte mangeur d hommes','Monstre','Terre','Insecte');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Trou noir','Magie',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Monster Reborn','Magie',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Changement de coeur','Magie',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Fissure','Magie',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Yami','Magie',NULL,'Terrain');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Trappe','Piège',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Waboku','Piège',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Jarre de capture du dragon','Piège',NULL,'Continue');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Piège inverse','Piège',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Offrande ultime','Piège',NULL,'Continue');

-- kaiba
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Dragon blanc aux yeux bleus','Monstre','Lumière','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Juge','Monstre','Terre','Guerrier');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Seigneur des D','Monstre','Ténèbres','Magicien');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Hane-Hane','Monstre','Terre','Bête');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Maître des pièges','Monstre','Terre','Guerrier');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Flûte d invocation du dragon','Magie',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Ookazi','Magie',NULL,'Normale');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Desserts seuls','Piège',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Renforts','Piège',NULL,'Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Enceinte du château','Piège',NULL,'Normale');

-- joey
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Dragon Noir aux yeux rouges','Monstre','Ténèbres','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Le spadassin de Landstar','Monstre','Terre','Guerrier');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Dragon Millénaire','Fusion','Vent','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Magicien du temps','Monstre','Lumière','Magicien');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Soldat pingouin','Monstre','Eau','Aqua');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Bouc émissaire','Magie',NULL,'Rapide');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Nuzzler Maléfique','Magie',NULL,'Équipement');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Sept outils du bandit','Piège',NULL,'Contre');

-- caracteristiques des cartes

-- yugi
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet Flip', 'Détruit un monstre sur le terrain');
INSERT INTO carte_a_caracteristique VALUES (1,5);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Détruit tous les monstres sur le Terrain');
INSERT INTO carte_a_caracteristique VALUES (2,6);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Sélectionnez 1 Carte Monstre dans le Cimetière de votre adversazire ou dans le vôtre et faites une Invocation Spéciale de ce monstre sur votre Terrain face recto en Position d Attaque ou de Défense');
INSERT INTO carte_a_caracteristique VALUES (3,7);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Sélectionnez 1 monstre sur le Terrain de votre adversaire. Prenez le contrôle du monstre sélectionné jusqu à la End Phase de ce tour.');
INSERT INTO carte_a_caracteristique VALUES (4,8);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Détruit 1 monstre face recto de votre adversaire avec l ATK la plus basse.');
INSERT INTO carte_a_caracteristique VALUES (5,9);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Augmente l ATK et la DEF de tous les monstres de Type Démon et Magicien de 200 points. Diminue aussi l ATK et la DEF de tous les monstres de Type Elfe de 200 points.');
INSERT INTO carte_a_caracteristique VALUES (6,10);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Lorsque votre adversaire fait une Invocation Normale ou une Invocation Flip d un Monstre avec une attaque de 1000 points ou plus, ce Monstre est détruit.');
INSERT INTO carte_a_caracteristique VALUES (7,11);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Tout dommage infligé par les monstres de l adversaire à tous les monstres de votre terrain et à vos life points est réduit à 0 durant le tour où cette carte est activée.');
INSERT INTO carte_a_caracteristique VALUES (8,12);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Tous les monstres de Type Dragon sur le terrain passent Position de Défense et restent dans cette positioin tat que cette carte resteface recto sur le terrain.');
INSERT INTO carte_a_caracteristique VALUES (9,13);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Toutes les augmentations et diminutions d ATK et de DEF sont interverties durant le tour où cette carte est Activée.');
INSERT INTO carte_a_caracteristique VALUES (10,14);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'En payant 500 Life Points, faites l Invocation Normale ou Posez 1 monstre supplémentaire. Vous ne pouvez activer cet effet que durant votre Main Phase ou la Battle Phase de votre adversaire.');
INSERT INTO carte_a_caracteristique VALUES (11,15);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '2500');
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '2100');
INSERT INTO carte_a_caracteristique VALUES (12,1);
INSERT INTO carte_a_caracteristique VALUES (13,1);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '1200');
INSERT INTO carte_a_caracteristique VALUES (12,2);
INSERT INTO carte_a_caracteristique VALUES (14,2);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '2300');
INSERT INTO carte_a_caracteristique VALUES (13,3);
INSERT INTO carte_a_caracteristique VALUES (15,3);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '2000');
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '1500');
INSERT INTO carte_a_caracteristique VALUES (16,4);
INSERT INTO carte_a_caracteristique VALUES (17,4);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '450');
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '600');
INSERT INTO carte_a_caracteristique VALUES (18,5);
INSERT INTO carte_a_caracteristique VALUES (19,5);

-- kaiba
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Tous les monstres de Type Dragon ne peuvent être la cible de Cartes Magie, Piège, ou autre effet désignant spécifiquement une cible tant que cette carte est face recto sur le Terrain.');
INSERT INTO carte_a_caracteristique VALUES (20,18);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet Flip', ' Sélectionnez 1 Carte Monstre sur le Terrain (quelle que soit sa position) et renvoyez-la dans la main de son propriétaire.');
INSERT INTO carte_a_caracteristique VALUES (21,19);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet Flip', 'Détruit 1 Carte Piège sur le Terrain. Si la cible de cette carte est face verso, retournez-la face recto. S il s agit d une Carte Piège, elle est détruite. Sinon, retournez-la dans sa positon face verso. La carte retournée n est pas Activée.');
INSERT INTO carte_a_caracteristique VALUES (22,20);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Lorsque vous avez 1 carte Seigneur des D. face recto sur le Terrain, vous pouvez Invoquer jusqu à 2 cartes de Type Dragon de votre main, en tant qu Invocations Spéciales.');
INSERT INTO carte_a_caracteristique VALUES (23,21);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Inflige 800 points de Dommages Directs aux Life Points de votre adversaire.');
INSERT INTO carte_a_caracteristique VALUES (24,22);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Infligez 500 points de Dommages Directs aux Life Points de votre adversaire pour chacun de ses monstres surle Terrain.');
INSERT INTO carte_a_caracteristique VALUES (25,23);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Augmente l ATK d 1 monstre sélectionné de 500 points durant le tour où cette carte est activée.');
INSERT INTO carte_a_caracteristique VALUES (26,24);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Augmente la DEF d 1 monstre sélectionné de 500 points durant le tour où cette carte est activée.');
INSERT INTO carte_a_caracteristique VALUES (27,25);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '3000');
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '2500');
INSERT INTO carte_a_caracteristique VALUES (28,16);
INSERT INTO carte_a_caracteristique VALUES (29,16);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '2200');
INSERT INTO carte_a_caracteristique VALUES (28,17);
INSERT INTO carte_a_caracteristique VALUES (17,17);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '1200');
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '1100');
INSERT INTO carte_a_caracteristique VALUES (29,18);
INSERT INTO carte_a_caracteristique VALUES (30,18);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '500');
INSERT INTO carte_a_caracteristique VALUES (18,19);
INSERT INTO carte_a_caracteristique VALUES (31,19);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '500');
INSERT INTO carte_a_caracteristique VALUES (32,20);
INSERT INTO carte_a_caracteristique VALUES (30,20);

-- joey
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'PILE-FACE : Si vous gagnez, tous les monstres sur le Terrain de votre adversaire sont détruits. Si vous perdez, tous les monstres sur votre terrain sont détruits et vous recevez des dommages égaux à la moitié des points d ATK de tous les monstres détruits');
INSERT INTO carte_a_caracteristique VALUES (33,29);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet Flip', 'You can return up to 2 Monster Cards from the field to the owner s hand.');
INSERT INTO carte_a_caracteristique VALUES (34,30);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Si vous Activez cette carte, vous ne pouvez pas faire d Invocation Normale, Flip ou Spéciale de monstre durant ce tour. Invoquez par Invocation Spéciale 4 "Jetons Mouton" (Type Bête/TERRE/Niveau 1/ATK 0/DEF 0)en position de Défense sur votre côté du Terrain. Les "Jetons Moutons" ne peuvent être utilisés cpomme Sacrifice pour une Invovation Sacrifice (ou pose).');
INSERT INTO carte_a_caracteristique VALUES (35,31);
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Un monstre équipé de cette carte augmente son ATK de 700 points. Lorsque cette carte est envoyée du Terrain au Cimetière, vous pouvez la renvoyer sur le dessus de votre Deck en payant 500 Life Points.');
INSERT INTO carte_a_caracteristique VALUES (36,32);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('Effet', 'Payez 1000 Life Points pour annuler l activation d une Carte Piège et détruisez-la.');
INSERT INTO carte_a_caracteristique VALUES (37,33);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '2400');
INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '2000');
INSERT INTO carte_a_caracteristique VALUES (38,26);
INSERT INTO carte_a_caracteristique VALUES (39,26);

INSERT INTO carte_a_caracteristique VALUES (32,27);
INSERT INTO carte_a_caracteristique VALUES (14,27);

INSERT INTO carte_a_caracteristique VALUES (38,28);
INSERT INTO carte_a_caracteristique VALUES (39,28);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('DEF', '400');
INSERT INTO carte_a_caracteristique VALUES (32,29);
INSERT INTO carte_a_caracteristique VALUES (40,29);

INSERT INTO caracteristiques(type_caracteristique,valeur_caracteristique) VALUES ('ATK', '750');
INSERT INTO carte_a_caracteristique VALUES (41,30);
INSERT INTO carte_a_caracteristique VALUES (31,30);

-- Decks

INSERT INTO Decks (nom_deck, id_joueur) VALUES ('Deck de base : Yugi', 1);
INSERT INTO Decks (nom_deck, id_joueur) VALUES ('Deck de base : Joey', 4);
INSERT INTO Decks (nom_deck, id_joueur) VALUES ('Deck de base : Kaiba', 5);

-- ajouter les cartes dans les Decks

-- yugi
INSERT INTO Deck_contient_carte VALUES (1,1);
INSERT INTO Deck_contient_carte VALUES (2,1);
INSERT INTO Deck_contient_carte VALUES (3,1);
INSERT INTO Deck_contient_carte VALUES (4,1);
INSERT INTO Deck_contient_carte VALUES (5,1);
INSERT INTO Deck_contient_carte VALUES (6,1);
INSERT INTO Deck_contient_carte VALUES (7,1);
INSERT INTO Deck_contient_carte VALUES (8,1);
INSERT INTO Deck_contient_carte VALUES (9,1);
INSERT INTO Deck_contient_carte VALUES (10,1);
INSERT INTO Deck_contient_carte VALUES (11,1);
INSERT INTO Deck_contient_carte VALUES (12,1);
INSERT INTO Deck_contient_carte VALUES (13,1);
INSERT INTO Deck_contient_carte VALUES (14,1);
INSERT INTO Deck_contient_carte VALUES (15,1);

-- kaiba
INSERT INTO Deck_contient_carte VALUES (16,2);
INSERT INTO Deck_contient_carte VALUES (17,2);
INSERT INTO Deck_contient_carte VALUES (18,2);
INSERT INTO Deck_contient_carte VALUES (19,2);
INSERT INTO Deck_contient_carte VALUES (20,2);
INSERT INTO Deck_contient_carte VALUES (21,2);
INSERT INTO Deck_contient_carte VALUES (22,2);
INSERT INTO Deck_contient_carte VALUES (23,2);
INSERT INTO Deck_contient_carte VALUES (24,2);
INSERT INTO Deck_contient_carte VALUES (25,2);
INSERT INTO Deck_contient_carte VALUES (6,2);
INSERT INTO Deck_contient_carte VALUES (7,2);
INSERT INTO Deck_contient_carte VALUES (9,2);
INSERT INTO Deck_contient_carte VALUES (11,2);
INSERT INTO Deck_contient_carte VALUES (15,2);

-- joey
INSERT INTO Deck_contient_carte VALUES (26,3);
INSERT INTO Deck_contient_carte VALUES (27,3);
INSERT INTO Deck_contient_carte VALUES (28,3);
INSERT INTO Deck_contient_carte VALUES (29,3);
INSERT INTO Deck_contient_carte VALUES (30,3);
INSERT INTO Deck_contient_carte VALUES (31,3);
INSERT INTO Deck_contient_carte VALUES (32,3);
INSERT INTO Deck_contient_carte VALUES (33,3);
INSERT INTO Deck_contient_carte VALUES (6,3);
INSERT INTO Deck_contient_carte VALUES (7,3);
INSERT INTO Deck_contient_carte VALUES (8,3);
INSERT INTO Deck_contient_carte VALUES (11,3);
INSERT INTO Deck_contient_carte VALUES (12,3);
INSERT INTO Deck_contient_carte VALUES (23,3);
INSERT INTO Deck_contient_carte VALUES (24,3);

-- Editions
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Deck de démarrage Yugi',126,'2002-03-01 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Deck de démarrage Kaiba',126,'2002-03-01 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Deck de démarrage Joey',120,'2002-03-01 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Légende du Dragon Blanc aux Yeux',136,'2002-03-08 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Metal Raider',144,'2002-06-26 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Maître des Magies',200,'2002-09-16 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Serviteur du Pharaon',300,'2002-10-20 00:00:00');
INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES ('Labyrinthes des Cauchemards',50,'2003-03-01 00:00:00');

-- Carte_est_edition

-- yugi
INSERT INTO Carte_est_edition VALUES (1,1,1.01);
INSERT INTO Carte_est_edition VALUES (2,1,1.01);
INSERT INTO Carte_est_edition VALUES (3,1,1.01);
INSERT INTO Carte_est_edition VALUES (4,1,1.01);
INSERT INTO Carte_est_edition VALUES (5,1,1.01);
INSERT INTO Carte_est_edition VALUES (6,1,1.01);
INSERT INTO Carte_est_edition VALUES (7,1,1.01);
INSERT INTO Carte_est_edition VALUES (8,1,1.01);
INSERT INTO Carte_est_edition VALUES (9,1,1.01);
INSERT INTO Carte_est_edition VALUES (10,1,1.01);
INSERT INTO Carte_est_edition VALUES (11,1,1.01);
INSERT INTO Carte_est_edition VALUES (12,1,1.01);
INSERT INTO Carte_est_edition VALUES (13,1,1.01);
INSERT INTO Carte_est_edition VALUES (14,1,1.01);
INSERT INTO Carte_est_edition VALUES (15,1,1.01);

-- kaiba
INSERT INTO Carte_est_edition VALUES (16,2,1.01);
INSERT INTO Carte_est_edition VALUES (17,2,1.01);
INSERT INTO Carte_est_edition VALUES (18,2,1.01);
INSERT INTO Carte_est_edition VALUES (19,2,1.01);
INSERT INTO Carte_est_edition VALUES (20,2,1.01);
INSERT INTO Carte_est_edition VALUES (21,2,1.01);
INSERT INTO Carte_est_edition VALUES (22,2,1.01);
INSERT INTO Carte_est_edition VALUES (23,2,1.01);
INSERT INTO Carte_est_edition VALUES (24,2,1.01);
INSERT INTO Carte_est_edition VALUES (25,2,1.01);
INSERT INTO Carte_est_edition VALUES (6,2,1.01);
INSERT INTO Carte_est_edition VALUES (8,2,1.01);
INSERT INTO Carte_est_edition VALUES (9,2,1.01);
INSERT INTO Carte_est_edition VALUES (11,2,1.01);
INSERT INTO Carte_est_edition VALUES (15,2,1.01);

-- Joey
INSERT INTO Carte_est_edition VALUES (26,3,1.01);
INSERT INTO Carte_est_edition VALUES (27,3,1.01);
INSERT INTO Carte_est_edition VALUES (28,3,1.01);
INSERT INTO Carte_est_edition VALUES (29,3,1.01);
INSERT INTO Carte_est_edition VALUES (30,3,1.01);
INSERT INTO Carte_est_edition VALUES (31,3,1.01);
INSERT INTO Carte_est_edition VALUES (32,3,1.01);
INSERT INTO Carte_est_edition VALUES (33,3,1.01);
INSERT INTO Carte_est_edition VALUES (6,3,1.01);
INSERT INTO Carte_est_edition VALUES (7,3,1.01);
INSERT INTO Carte_est_edition VALUES (8,3,1.01);
INSERT INTO Carte_est_edition VALUES (11,3,1.01);
INSERT INTO Carte_est_edition VALUES (12,3,1.01);
INSERT INTO Carte_est_edition VALUES (15,3,1.01);
INSERT INTO Carte_est_edition VALUES (23,3,1.01);

-- cartes editions "rare" : cote plus élevée

-- yugi
INSERT INTO Carte_est_edition VALUES (1,6,6);
INSERT INTO Carte_est_edition VALUES (3,4,2);
INSERT INTO Carte_est_edition VALUES (6,7,1.5);
INSERT INTO Carte_est_edition VALUES (7,4,3);
INSERT INTO Carte_est_edition VALUES (8,6,5);

INSERT INTO Carte_est_edition VALUES (1,7,5);
INSERT INTO Carte_est_edition VALUES (1,8,5);

-- kaiba
INSERT INTO Carte_est_edition VALUES (16,4,5);

-- joey
INSERT INTO Carte_est_edition VALUES (26,5,3);
INSERT INTO Carte_est_edition VALUES (29,6,5);
INSERT INTO Carte_est_edition VALUES (29,7,3);

-- Tournois
INSERT INTO Tournois (lieu, date_tournoi, type_tournoi) VALUES ('Duel Académie', '2019-12-01 12:00:00', 'Triangulaire');
INSERT INTO Tournois (lieu, date_tournoi, type_tournoi) VALUES ('Manoir de Pegasus', '2018-04-09 21:30:00', 'Ligue Régulière');
INSERT INTO Tournois (lieu, date_tournoi, type_tournoi) VALUES ('Magasin de Grand-père', '2002-03-04 09:10:00', 'Amical');

-- Parties
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (4,'VICTOIRE',1);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (1,'DEFAITE',1);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (5,'VICTOIRE',1);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (1,'DEFAITE',1);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (4,'DEFAITE',1);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (5,'VICTOIRE',1);

INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (4,'DEFAITE',2);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (1,'VICTOIRE',2);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (5,'VICTOIRE',2);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (1,'DEFAITE',2);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (4,'DEFAITE',2);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (5,'VICTOIRE',2);

INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (4,'VICTOIRE',3);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (1,'DEFAITE',3);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (5,'VICTOIRE',3);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (1,'DEFAITE',3);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (4,'VICTOIRE',3);
INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (5,'DEFAITE',3);

-- Partie_utilise_deck
INSERT INTO Partie_utilise_deck VALUES (1,1);
INSERT INTO Partie_utilise_deck VALUES (2,2);
INSERT INTO Partie_utilise_deck VALUES (1,3);
INSERT INTO Partie_utilise_deck VALUES (3,4);
INSERT INTO Partie_utilise_deck VALUES (3,5);
INSERT INTO Partie_utilise_deck VALUES (2,6);

INSERT INTO Partie_utilise_deck VALUES (1,7);
INSERT INTO Partie_utilise_deck VALUES (2,8);
INSERT INTO Partie_utilise_deck VALUES (1,9);
INSERT INTO Partie_utilise_deck VALUES (3,10);
INSERT INTO Partie_utilise_deck VALUES (3,11);
INSERT INTO Partie_utilise_deck VALUES (2,12);

INSERT INTO Partie_utilise_deck VALUES (1,13);
INSERT INTO Partie_utilise_deck VALUES (2,14);
INSERT INTO Partie_utilise_deck VALUES (1,15);
INSERT INTO Partie_utilise_deck VALUES (3,16);
INSERT INTO Partie_utilise_deck VALUES (3,17);
INSERT INTO Partie_utilise_deck VALUES (2,18);

-- exemplaires

--  exemplaires des cartes de yugi
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 79, 'Brillante', 6,1,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 100, 'Ultra Rare', 6,2,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 80, 'Commune', 4,3,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', '2004-02-06 00:00:00', 56, 'Commune', 1,4,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 20, 'Commune', 1,5,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 86, 'Chromatique', 7,6,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 100, 'Collector', 4,7,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 40, 'Rare', 6,8,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', '2002-03-06 12:00:00', 80, 'Rare', 1,9,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-04-12 23:00:00', 'Achat', NULL, 45, 'Brillante', 1,10,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-04-13 12:00:00', 'Achat', NULL, 80, 'Brillante', 1,11,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2003-01-03 06:00:00', 'Achat', '2004-03-06 00:00:00', 86, 'Rare', 1,12,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2003-07-21 21:00:00', 'Deck', '2003-07-22 00:00:00', 79, 'Ultra Rare', 1,13,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 70, 'Commune', 1,14,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-07-02 12:00:00', 'Deck', '2004-03-06 00:00:00', 70, 'Commune', 1,15,1);

INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 50, 'Rare', 1,1,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 46, 'Rare', 1,2,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-07-02 12:00:00', 'Deck', NULL, 03, 'Commune', 1,3,1);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 90, 'Rare', 1,6,1);

--  exemplaires des cartes de kaiba
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 100, 'Chromatique', 4,16,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', NULL, 53, 'Ultra Rare', 2,17,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', NULL, 78, 'Rare', 2,18,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', '2004-02-06 00:00:00', 20, 'Commune', 2,19,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Trouvaille', '2004-02-06 00:00:00', 20, 'Commune', 2,20,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Trouvaille', '2004-02-06 00:00:00', 46, 'Commune', 2,21,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', NULL, 66, 'Collector', 2,22,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', NULL, 66, 'Rare', 2,23,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', '2002-03-06 12:00:00', 80, 'Commune', 2,24,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-04-12 23:00:00', 'Achat', NULL, 100, 'Brillante', 2,25,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-04-13 12:00:00', 'Achat', NULL, 95, 'Brillante', 7,6,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2003-01-03 06:00:00', 'Achat', '2004-03-06 00:00:00', 80, 'Rare', 4,7,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2003-07-21 21:00:00', 'Deck', '2003-07-22 00:00:00', 20, 'Commune', 2,9,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 32, 'Commune', 2,11,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-07-02 12:00:00', 'Deck', '2004-03-06 00:00:00', 37, 'X', 2,15,5);


INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Achat', NULL, 100, 'Rare', 1,1,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Trouvaille', NULL, 23, 'Rare', 1,2,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Trouvaille', NULL, 23, 'Ultra Rare', 7,29,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Trouvaille', NULL, 23, 'Commune', 3,29,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-07-02 12:00:00', 'Deck', NULL, 03, 'Commune', 2,16,5);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Trouvaille', NULL, 90, 'Rare', 1,6,5);

-- exemplaires des cartes de joey
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', '2004-02-06 00:00:00', 100, 'Commune', 5,26,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', NULL, 45, 'Commune', 3,27,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', NULL, 55, 'X', 3,28,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', NULL, 100, 'Commune', 7,29,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Trouvaille', '2004-02-06 00:00:00', 60, 'Ultra Rare', 3,30,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Trouvaille', '2004-02-06 00:00:00', 80, 'Commune', 3,31,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', '2004-02-06 00:00:00', 79, 'Collector', 3,32,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Deck', '2004-02-06 00:00:00', 90, 'Collector', 3,33,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-03-06 12:00:00', 'Booster', '2002-03-06 12:00:00', 45, 'Commune', 7,6,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-04-12 23:00:00', 'Booster', NULL, 100, 'Brillante', 4,7,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-04-13 12:00:00', 'Achat', NULL, 100, 'Brillante', 6,8,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2003-01-03 06:00:00', 'Deck', '2004-03-06 00:00:00', 100, 'Rare', 3,11,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2003-07-21 21:00:00', 'Deck', '2003-07-22 00:00:00', 12, 'Commune', 3,12,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 44, 'Commune', 3,23,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-07-02 12:00:00', 'Deck', '2004-03-06 00:00:00', 45, 'X', 3,24,4);

INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Booster', NULL, 60, 'Ultra Rare', 6,1,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Deck', NULL, 46, 'Rare', 1,2,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Trouvaille', NULL, 23, 'Commune', 3,29,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2002-07-02 12:00:00', 'Deck', NULL, 03, 'Commune', 2,16,4);
INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte, qualite, effet_impression, id_edition, id_carte, id_joueur) VALUES ('2004-01-06 12:00:00', 'Trouvaille', NULL, 90, 'Rare', 1,6,4);
