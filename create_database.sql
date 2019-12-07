-- Création de la base de données
USE educhemin001;

SET FOREIGN_KEY_CHECKS=0;


-- Supprimer les tables si elles existent
DROP TABLE IF EXISTS Carte_a_caracteristiques;

DROP TABLE IF EXISTS Partie_utilise_decks;

DROP TABLE IF EXISTS Deck_contient_cartes;

DROP TABLE IF EXISTS Carte_est_edition;


DROP TABLE IF EXISTS Tournois;

DROP TABLE IF EXISTS Parties;

DROP TABLE IF EXISTS Decks;

DROP TABLE IF EXISTS Joueurs;

DROP TABLE IF EXISTS Cartes;

DROP TABLE IF EXISTS Caracteristiques;

DROP TABLE IF EXISTS Editions;

DROP TABLE IF EXISTS Exemplaires;


SET FOREIGN_KEY_CHECKS=1;


-- Création de tables
CREATE TABLE IF NOT EXISTS Tournois
(
    id_tournoi			            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lieu                            NVARCHAR(50)		not null,
    date_tournoi                    TIMESTAMP	        not null,
    type_tournoi                    NVARCHAR(50)
);


CREATE TABLE IF NOT EXISTS Parties
(
    id_partie                       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    adversaire                      NVARCHAR(50)		not null,
    resultat                        NVARCHAR(10),
    id_tournoi 			    INT UNSIGNED        not null,
    FOREIGN KEY (id_tournoi) REFERENCES Tournois(id_tournoi)
);


CREATE TABLE IF NOT EXISTS Joueurs
(
    id_joueur		                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom				                NVARCHAR(50)		not null,
    prenom			                NVARCHAR(50)		not null,
    pseudo			                NVARCHAR(50)
);


CREATE TABLE IF NOT EXISTS Decks
(
    id_deck                         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_deck                        NVARCHAR(50)		not null,
    id_joueur 		                INT UNSIGNED        not null,
    FOREIGN KEY (id_joueur) REFERENCES Joueurs(id_joueur)
);


CREATE TABLE IF NOT EXISTS Partie_utilise_deck
(
    id_deck                         INT UNSIGNED	not null,
    id_partie                       INT UNSIGNED        not null,
    PRIMARY KEY(id_deck,id_partie),
    FOREIGN KEY (id_deck) REFERENCES Decks(id_deck),
    FOREIGN KEY (id_partie) REFERENCES Parties(id_partie)
);


CREATE TABLE IF NOT EXISTS Cartes
(
    id_carte			            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre   		                NVARCHAR(50)		not null,
    type_carte		                NVARCHAR(50)		not null,
    nature			                NVARCHAR(50)		not null,
    famille    			            NVARCHAR(50) 	    not null
);


CREATE TABLE IF NOT EXISTS Deck_contient_carte
(
    id_carte			            INT	UNSIGNED	        not null,
    id_deck 			            INT	UNSIGNED	        not null,
    CONSTRAINT PK_id_deck_carte PRIMARY KEY(id_carte,id_deck),
    FOREIGN KEY (id_deck) REFERENCES Decks(id_deck),
    FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte)
);


CREATE TABLE IF NOT EXISTS Caracteristiques
(
    id_caracteristique              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type_caracteristique            NVARCHAR(20)         not null,
    valeur_caracteristique          INT(3)               not null
);


CREATE TABLE IF NOT EXISTS Carte_a_caracteristique
(
    id_caracteristique              	INT UNSIGNED not null,
    id_carte        			INT UNSIGNED not null,
    PRIMARY KEY(id_caracteristique,id_carte),
    FOREIGN KEY (id_caracteristique) REFERENCES Caracteristiques(id_caracteristique),
    FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte)
);


CREATE TABLE IF NOT EXISTS Editions
(
    id_edition	                    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_edition                     NVARCHAR(50)         not null,
    nombre_de_tirage                INT(8)               not null
);


CREATE TABLE IF NOT EXISTS Carte_est_edition
(
    id_carte			            INT UNSIGNED			not null,
    id_edition			            INT UNSIGNED		not null,
    cote                            INT UNSIGNED        not null,
    CONSTRAINT PK_id_carte_edition PRIMARY KEY(id_carte,id_edition),
    FOREIGN KEY (id_edition) REFERENCES Editions(id_edition),
    FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte)
);


CREATE TABLE IF NOT EXISTS Exemplaires 
(
    id_exemplaire	                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date_acquisition        	    TIMESTAMP       not null,
    date_impression        	        TIMESTAMP       not null,
    mode_acquisition		        NVARCHAR(20)    not null,
    date_perte      			    TIMESTAMP,	
    qualite         			    INT(3)		    not null,
    effet_impression    		    NVARCHAR(20)    not null,
    id_edition			            INT	UNSIGNED		    not null,
    id_carte 			            INT UNSIGNED		    not null,
    id_joueur 		                    INT UNSIGNED		    not null,
    FOREIGN KEY (id_edition) REFERENCES Editions(id_edition),
    FOREIGN KEY (id_carte) REFERENCES Cartes(id_carte),
    FOREIGN KEY (id_joueur) REFERENCES Joueurs(id_joueur)
);
