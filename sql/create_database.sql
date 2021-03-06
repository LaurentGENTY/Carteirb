SET FOREIGN_KEY_CHECKS=0;

-- Supprimer les tables si elles existent

DROP VIEW IF EXISTS Joueurs_Adversaires_Victoires;

DROP VIEW IF EXISTS Cartes_Caracteristiques_Valeurs;

DROP TABLE IF EXISTS Carte_a_caracteristique;

DROP TABLE IF EXISTS Partie_utilise_deck;

DROP TABLE IF EXISTS Deck_contient_carte;

DROP TABLE IF EXISTS Carte_est_edition;

DROP TABLE IF EXISTS Exemplaires;

DROP TABLE IF EXISTS Decks;

DROP TABLE IF EXISTS Parties;

DROP TABLE IF EXISTS Joueurs;

DROP TABLE IF EXISTS Editions;

DROP TABLE IF EXISTS Cartes;

DROP TABLE IF EXISTS Caracteristiques;

DROP TABLE IF EXISTS Tournois;

SET FOREIGN_KEY_CHECKS=1;


-- Création de tables
CREATE TABLE IF NOT EXISTS Tournois
(
   id_tournoi			            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   lieu                            NVARCHAR(50)		not null,
   date_tournoi                    TIMESTAMP	        not null,
   type_tournoi                    NVARCHAR(50)
) ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS Parties
(
   id_partie                       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   adversaire                      INT UNSIGNED		not null,
   resultat                        ENUM('VICTOIRE','DEFAITE'),
   id_tournoi 			    		INT UNSIGNED        not null
) ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS Joueurs
(
   id_joueur		                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   nom				                NVARCHAR(50)		not null,
   prenom			                NVARCHAR(50)		not null,
   pseudo			                NVARCHAR(50)
) ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS Decks
(
   id_deck                         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   nom_deck                        NVARCHAR(50)		not null,
   id_joueur 		                INT UNSIGNED        not null
)  ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS Cartes
(
   id_carte			            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   titre   		                NVARCHAR(50)		not null,
   type_carte		              ENUM('Monstre','Magie','Piège','XYZ','Fusion') not null,
   nature			                NVARCHAR(50),
   famille    			            NVARCHAR(50) 	    not null,
   image                      NVARCHAR(512)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Caracteristiques
(
   id_caracteristique              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   type_caracteristique            NVARCHAR(10)         not null,
   valeur_caracteristique          NVARCHAR(1024)               not null
)  ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS Editions
(
   id_edition	                    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   nom_edition                     NVARCHAR(50)         not null,
   nombre_de_tirage                INT(8)               not null,
   date_impression					TIMESTAMP			 not null
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Exemplaires
(
   id_exemplaire	                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   date_acquisition        	    TIMESTAMP       not null,
   mode_acquisition		        NVARCHAR(20)    not null,
   date_perte      			    TIMESTAMP,
   qualite         			    INT(3)		    not null,
   effet_impression    		    ENUM('Commune','Rare', 'Ultra Rare', 'Chromatique','X','Brillante','Collector') not null,
   id_edition			            INT UNSIGNED		    not null,
   id_carte 			            INT UNSIGNED		    not null,
   id_joueur 		                INT UNSIGNED		    not null
) ENGINE = INNODB;

-- assoc tables

CREATE TABLE IF NOT EXISTS Partie_utilise_deck
(
   id_deck                         INT UNSIGNED		not null,
   id_partie                       INT UNSIGNED        not null,
   PRIMARY KEY(id_deck,id_partie)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Deck_contient_carte
(
   id_carte			            INT	UNSIGNED	        not null,
   id_deck 			            INT	UNSIGNED	        not null,
   PRIMARY KEY(id_carte,id_deck)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Carte_a_caracteristique
(
   id_caracteristique              	INT UNSIGNED not null,
   id_carte        			INT UNSIGNED not null,
   PRIMARY KEY(id_caracteristique,id_carte)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Carte_est_edition
(
   id_carte			            INT UNSIGNED		not null,
   id_edition			            INT UNSIGNED		not null,
   cote							FLOAT(10,2) UNSIGNED		not null,
   PRIMARY KEY(id_carte,id_edition)
) ENGINE = INNODB;

ALTER TABLE Editions
 ADD CONSTRAINT CHK_nb_tirages CHECK(nombre_de_tirage >= 0);

ALTER TABLE Parties
 ADD CONSTRAINT FK_parties_tournoi FOREIGN KEY (id_tournoi) REFERENCES Tournois(id_tournoi) ON DELETE CASCADE,
 ADD CONSTRAINT FK_parties_adversaire FOREIGN KEY (adversaire) REFERENCES Joueurs(id_joueur) ON DELETE CASCADE;

ALTER TABLE Decks
 ADD CONSTRAINT FK_deck_joueur FOREIGN KEY (id_joueur) REFERENCES Joueurs(id_joueur) ON DELETE CASCADE;

ALTER TABLE Exemplaires
 ADD CONSTRAINT FK_exemplaires_edition FOREIGN KEY (id_edition) REFERENCES Editions(id_edition),
   ADD CONSTRAINT FK_exemplaires_carte FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte),
   ADD CONSTRAINT FK_exemplaires_joueur FOREIGN KEY (id_joueur) REFERENCES Joueurs(id_joueur),
   ADD CONSTRAINT CHK_qualite CHECK(qualite <= 100 AND qualite >= 0),
   ADD CONSTRAINT CHK_dates CHECK(date_acquisition <= date_perte);

ALTER TABLE Partie_utilise_deck
 ADD CONSTRAINT FK_partie_deck_deck FOREIGN KEY (id_deck) REFERENCES Decks(id_deck) ON DELETE CASCADE,
   ADD CONSTRAINT FK_partie_deck_partie FOREIGN KEY (id_partie) REFERENCES Parties(id_partie) ON DELETE CASCADE;

ALTER TABLE Deck_contient_carte
 ADD CONSTRAINT FK_deck_carte_deck FOREIGN KEY (id_deck) REFERENCES Decks(id_deck) ON DELETE CASCADE,
   ADD CONSTRAINT FK_deck_carte_carte FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte) ON DELETE CASCADE;

ALTER TABLE Carte_a_caracteristique
 ADD CONSTRAINT FK_carte_caracteristique_caracteristique FOREIGN KEY (id_caracteristique) REFERENCES Caracteristiques(id_caracteristique) ON DELETE CASCADE,
   ADD CONSTRAINT FK_carte_caracteristique_carte FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte) ON DELETE CASCADE;

ALTER TABLE Carte_est_edition
 ADD CONSTRAINT FK_carte_edition_edition FOREIGN KEY (id_edition) REFERENCES Editions(id_edition) ON DELETE CASCADE,
   ADD CONSTRAINT FK_carte_edition_carte FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte) ON DELETE CASCADE,
   ADD CONSTRAINT CHK_cote CHECK(cote >= 1);

ALTER TABLE Cartes
  ADD CONSTRAINT UC_titre UNIQUE (titre);

CREATE VIEW Joueurs_Adversaires_Victoires AS
(
  SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, CONCAT(J2.nom, ' ', J2.prenom) AS Joueur2, COUNT(*) AS Victoires
  FROM Joueurs J1
  INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
  INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
  INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
  INNER JOIN Joueurs J2 ON Parties.adversaire = J2.id_joueur
  WHERE resultat = 'VICTOIRE'
  GROUP BY Joueur1, Joueur2
);

CREATE VIEW Cartes_Caracteristiques_Valeurs AS
(
   SELECT Cartes.id_carte, Cartes.famille, Caracteristiques.type_caracteristique, Caracteristiques.valeur_caracteristique
   FROM Cartes 
   INNER JOIN Carte_a_caracteristique ON Cartes.id_carte = Carte_a_caracteristique.id_carte
   INNER JOIN Caracteristiques ON Carte_a_caracteristique.id_caracteristique = Caracteristiques.id_caracteristique
   WHERE Caracteristiques.type_caracteristique NOT IN ('Effet', 'Effet Flip')
   ORDER BY famille asc
);
