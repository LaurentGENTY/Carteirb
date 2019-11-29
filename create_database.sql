-- Supprimer les tables si elles existent
DROP TABLE IF EXISTS Tournois;
DROP TABLE IF EXISTS Parties;
DROP TABLE IF EXISTS Decks;
DROP TABLE IF EXISTS Parties_utilise_decks;
DROP TABLE IF EXISTS Joueurs;
DROP TABLE IF EXISTS Cartes;
DROP TABLE IF EXISTS Decks_contient_cartes;
DROP TABLE IF EXISTS Caracteristiques;
DROP TABLE IF EXISTS Cartes_a_caracteristiques;
DROP TABLE IF EXISTS Editions;
DROP TABLE IF EXISTS Cartes_est_edition;
DROP TABLE IF EXISTS Exemplaires;

-- Supprimer la base de données
DROP DATABASE IF EXISTS Carteirb;

-- Création de la base de données
CREATE DATABASE Carteirb CHARACTER SET 'utf8';
USE Carteirb;

-- Création de tables
CREATE TABLE IF NOT EXISTS Tournois
(
    id_tournoi			            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lieu                            NVARCHAR(50)		not null,
    date                            TIMESTAMP	        not null,
    type_tournoi                    NVARCHAR(50)
)

CREATE TABLE Parties
(
    id_partie                       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    adversaire                      NVARCHAR(50)		not null,
    resultat                        NVARCHAR(10),
    id_tournoi 			            INT                 not null
)

CREATE TABLE Decks
(
    id_deck                         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_deck                        NVARCHAR(50)		not null,
    id_joueur 		                INT                 not null
)

CREATE TABLE Partie_utilise_deck
(
    id_deck                         NVARCHAR(50)		not null,
    id_partie                       NVARCHAR(10)        not null,
    CONSTRAINT PK_id_deck_partie PRIMARY KEY(id_deck,id_partie)
)

CREATE TABLE Utilisateurs
(
    id_joueur		                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom				                NVARCHAR(50)		not null,
    prenom			                NVARCHAR(50)		not null,
    pseudo			                NVARCHAR(50)
)

CREATE TABLE Cartes
(
    id_carte			            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre   		                NVARCHAR(50)		not null,
    type_carte		                NVARCHAR(50)		not null,
    nature			                NVARCHAR(50)		not null,
    famille    			            NVARCHAR(50) 	    not null
)

CREATE TABLE Deck_contient_carte
(
    id_carte			            INT			        not null,
    id_deck 			            INT			        not null
)

CREATE TABLE Caracteristiques
(
    id_caracteristique              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    type_caracteristique            NVARCHAR(20)         not null,
    valeur_caracteristique          INT(3)               not null
)

CREATE TABLE Carte_a_caracteristique
(
    id_caracteristique              INT not null,
    id_carte        			    INT not null
)

CREATE TABLE Editions
(
    id_edition	                    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom_edition                     NVARCHAR(50)         not null,
    nombre_de_tirage                INT(8)               not null
)

CREATE TABLE Carte_est_edition
(
    id_carte			            INT			not null,
    id_edition			            INT 		not null
)

CREATE TABLE Exemplaires 
(
    id_exemplaire	                INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date_acquisition        	    TIMESTAMP       not null,
    mode_acquisition		        NVARCHAR(20)    not null,
    date_perte      			    TIMESTAMP,	
    qualite         			    INT(3)		    not null,
    effet_impression    		    NVARCHAR(20)    not null,
    id_edition			            INT			    not null,
    id_carte 			            INT 		    not null,
    id_joueur 		                INT 		    not null
)

-- Ajout des contraintes de clés étrangères
ALTER TABLE Parties
    ADD CONSTRAINT FK_id_tournoi_parties FOREIGN KEY (id_tournoi) REFERENCES Tournois (id_tournoi)

ALTER TABLE Decks
    ADD CONSTRAINT FK_id_joueur_decks FOREIGN KEY (id_joueur) REFERENCES Joueurs (id_joueur);

ALTER TABLE Partie_utilise_deck
    ADD CONSTRAINT FK_id_partie_partie_deck FOREIGN KEY (id_partie) REFERENCES Parties (id_partie),
        CONSTRAINT FK_id_deck  FOREIGN KEY (id_deck) REFERENCES Decks (id_deck);

ALTER TABLE Deck_contient_carte
    ADD CONSTRAINT FK_id_carte_deck_carte FOREIGN KEY(id_carte) REFERENCES Cartes (id_carte),
        CONSTRAINT FK_id_deck_deck_carte FOREIGN KEY(id_deck)  REFERENCES Decks (id_deck);

ALTER TABLE Carte_a_caracteristique
    ADD CONSTRAINT FK_id_caracteristique_carte_caracteristique FOREIGN KEY(id_caracteristique) REFERENCES Caracteristiques (id_caracteristique),
        CONSTRAINT FK_id_carte_carte_caracteristique FOREIGN KEY (id_carte) REFERENCES Cartes (id_carte);

ALTER TABLE Carte_est_edition
    ADD CONSTRAINT FK_id_carte_carte_edition FOREIGN KEY(id_carte) REFERENCES Cartes (id_carte),
        CONSTRAINT FK_id_edition_carte_edition FOREIGN KEY (id_edition) REFERENCES Editions (id_edition);

ALTER TABLE Exemplaires
    ADD CONSTRAINT FK_id_edition_exemplaires FOREIGN KEY(id_edition) REFERENCES Editions (id_edition),
        CONSTRAINT FK_id_carte_exemplaires FOREIGN KEY(id_carte) REFERENCES Cartes (id_carte),
        CONSTRAINT FK_id_joueur_exemplaires FOREIGN KEY(id_joueur) REFERENCES Joueurs (id_joueur);