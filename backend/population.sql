INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Yûgi','Muto','Heros11');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Yami','Yugi','Pyramide91');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Téa','Gardner','FilleFille');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Joey','Wheeler','Jojo');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Seto','Kaiba','Rivalito');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Ryô','Bakura','xxDarkSasukexx');
INSERT INTO joueurs(nom,prenom,pseudo) VALUES ('Pegasus','Crawford','Illuminati');

-- Cartes

-- yugi
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Magicien des ténèbres','Monstre','Ténèbres','Magicien');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Crâne invoqué','Monstre','Ténèbres','Démon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Gaïa Chevalier Implacable','Monstre','Terre','Guerrier');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Malédiction du dragon','Monstre','Ténèbres','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Insecte mangeur d hommes','Monstre','Terre','Insecte');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Trou noir','Magie','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Monster Reborn','Magie','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Changement de coeur','Magie','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Fissure','Magie','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Yami','Magie','','Terrain');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Trappe','Piège','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Waboku','Piège','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Jarre de capture du dragon','Piège','','Continue');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Piège inverse','Piège','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Offrande ultime','Piège','','Continue');

-- kaiba
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Dragon blanc aux yeux bleus','Monstre','Lumière','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Juge','Monstre','Terre','Guerrier');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Seigneur des D','Monstre','Ténèbres','Magicien');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Hane-Hane','Monstre','Terre','Bête');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Maître des pièges','Monstre','Terre','Guerrier');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Flûte d invocation du dragon','Magie','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Ookazi','Magie','','Normale');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Desserts seuls','Piège','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Renforts','Piège','','Normale');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Enceinte du château','Piège','','Normale');

-- joey
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Dragon Noir aux yeux rouges','Monstre','Ténèbres','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Le spadassin de Landstar','Monstre','Terre','Guerrier');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Dragon Millénaire','Fusion','Vent','Dragon');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Magicien du temps','Monstre','Lumière','Magicien');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Soldat pingouin','Monstre','Eau','Aqua');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Bouc émissaire','Magie','','Rapide');
INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Nuzzler Maléfique','Magie','','Équipement');

INSERT INTO cartes(titre,type_carte,nature,famille) VALUES ('Sept outils du bandit','Piège','','Contre');

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
