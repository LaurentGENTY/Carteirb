dbeaver

CREATE TABLE Tournois
(
    ID_TOURNOI			    SERIAL PRIMARY KEY,
    LIEU                            VARCHAR(50)		not null,
    DATE                            TIMESTAMP	        not null,
    TYPE_TOURNOI                    VARCHAR(50)
)


CREATE TABLE Parties
(

    ID_PARTIE                       SERIAL PRIMARY KEY,
    ADVERSAIRE                      VARCHAR(50)		not null,
    RESULTAT                        VARCHAR(10),
    ID_TOURNOI 			    INT			not null,
    FOREIGN KEY (ID_TOURNOI) REFERENCES Tournois (ID_TOURNOI)
)

CREATE TABLE Decks
(
    ID_DECK                         SERIAL PRIMARY KEY,
    NOM_DECK                        VARCHAR(50)		not null,
    ID_UTILISATEUR 		    INT 		not null,
    FOREIGN KEY (ID_UTILISATEUR) REFERENCES Decks (ID_DECK)
)

CREATE TABLE Parties_utilise_decks
(

    ID_DECK                         VARCHAR(50)		not null,
    ID_PARTIE                       VARCHAR(10),
    PRIMARY KEY(ID_DECK,ID_PARTIE),
    FOREIGN KEY (ID_PARTIE) REFERENCES Parties (ID_PARTIE),
    FOREIGN KEY (ID_DECK)   REFERENCES Parties (ID_DECK)
)

CREATE TABLE Utilisateurs
(
    ID_UTILISATEUR		    SERIAL PRIMARY KEY,
    NOM				    VARCHAR(50)		not null,
    PRENOM			    VARCHAR(50)		not null,
    PSEUDO			    VARCHAR(50)
)

CREATE TABLE Cartes
(
    ID_CARTE			    SERIAL PRIMARY KEY,
    TITRE			    VARCHAR(50)		not null,
    TYPE			    VARCHAR(50)		not null,
    NATURE			    VARCHAR(50)		not null,
    FAMILLE    			    VARCHAR(50) 	not null
)

CREATE TABLE Decks_contient_cartes
(
    ID_CARTE			    INT			not null,
    ID_DECK 			    INT			not null,
    FOREIGN KEY(ID_CARTE) REFERENCES Cartes (ID_CARTE)
    FOREIGN KEY(ID_DECK)  REFERENCES Decks (ID_DECK)
)

CREATE TABLE Caracteristiques
(
    ID_CARACTERISTIQUE              SERIAL PRIMARY KEY,
    TYPE_CARACTERISTIQUE            VARCHAR(20)         not null,
    VALEUR_CARACTERISTQUE           INT(3)              not null
)

CREATE TABLE Cartes_a_caracteristiques
(
    ID_CARACTERISTIQUE              INT,
    ID_CARTE			    INT,
    FOREIGN KEY(ID_CARACTERISTIQUE) REFERENCES Caracteristiques (ID_CARACTERISTIQUE)
    FOREIGN KEY (ID_CARTE) REFERENCES Cartes (ID_CARTE)
)

CREATE TABLE Editions
(
    ID_EDITION	                    SERIAL PRIMARY KEY,
    NOM_EDITION                     VARCHAR(50)         not null,
    NOMBRE_DE_TIRAGE                INT(8)              not null
)

CREATE TABLE Cartes_est_edition
(
    ID_CARTE			    INT			not null,
    ID_EDITION			    INT 		not null,
    FOREIGN KEY(ID_CARTE,ID_EDITION) REFERENCES parent_table (Cartes,Editions)
)

CREATE TABLE Exemplaires 
(
    ID_EXEMPLAIRE	            SERIAL PRIMARY KEY,
    DATE_D_ACQUISITION		    TIMESTAMP	   	not null,
    MODE_D_ACQUISTION		    VARCHAR(20)		not null,
    DATE_PERTE			    TIMESTAMP,	
    QUALITE			    INT(3)		not null,
    EFFET_D_IMPRESSION		    VARCHAR(20)		not null,
    ID_EDITION			    INT			not null,
    ID_CARTE 			    INT 		not null,
    ID_UTILISATEUR 		    INT 		not null,
    FOREIGN KEY(ID_EDITION)       REFERENCES Editions (ID_EDITION),
    FOREIGN KEY(ID_CARTE)         REFERENCES Cartes (ID_CARTE),
    FOREIGN KEY(ID_UTILISATEUR)   REFERENCES Utilisateurs (ID_UTILISATEUR)
)
