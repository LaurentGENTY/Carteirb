-- 1 iste des cartes d’un certain type.
SELECT *
FROM cartes
WHERE cartes.type_carte = 'Monstre';

-- 2 iste des cartes qui ne font partie d’aucun deck
SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille, Cartes.image
            FROM Cartes
            WHERE Cartes.id_carte NOT IN (
                SELECT Cartes.id_carte
                FROM Cartes
                INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
            );

-- 3 a liste des joueurs qui n’ont fait aucune partie (ce sont juste des collectionneurs)
SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            FROM Joueurs
            WHERE Joueurs.id_joueur NOT IN (
               SELECT Joueurs.id_joueur
               FROM Joueurs
               INNER JOIN Decks on Joueurs.id_joueur = Decks.id_joueur
               INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
            );

-- a liste des joueurs, avec le nombre de cartes qu’ils possèdent.
SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(Exemplaires.id_exemplaire) as nbExemplaires
          FROM Joueurs
          LEFT JOIN Exemplaires ON Joueurs.id_joueur = Exemplaires.id_joueur
          GROUP BY Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo;

-- a liste des joueurs classés par ordre décroissant selon la valeur de leur collection (la valeur d’une carte étant estimée au produit de sa côte par son état).
SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, ROUND(SUM(Exemplaires.qualite / 100 * Carte_est_edition.cote), 2) AS Valeur_de_la_collection, Joueurs.id_joueur
            FROM Joueurs
            LEFT JOIN Exemplaires on Joueurs.id_joueur = Exemplaires.id_joueur
            LEFT JOIN Editions on Exemplaires.id_edition = Editions.id_edition
            LEFT JOIN Carte_est_edition ON Editions.id_edition = Carte_est_edition.id_edition
            GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY Valeur_de_la_collection desc;

-- a liste des cartes avec le nombre de joueurs qui les utilisent dans leurs decks.
SELECT Cartes.id_carte, Cartes.titre, COUNT(Joueurs.id_joueur) AS nbJoueurs, Cartes.image
            FROM Cartes
            LEFT JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
            INNER JOIN Decks ON Deck_contient_carte.id_Deck = Decks.id_Deck
            INNER JOIN Joueurs ON Decks.id_joueur = Joueurs.id_joueur
            GROUP BY Cartes.id_carte, Cartes.titre, Cartes.type_carte, Cartes.nature, Cartes.famille
            ORDER BY nbJoueurs DESC;

-- a liste des joueurs possédant le plus de cartes rares (date d’impression antérieure à 2000 ou tirage inférieur à 100).
SELECT joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo, COUNT(exemplaires.id_exemplaire) as nbCartes
FROM joueurs
INNER JOIN exemplaires ON joueurs.id_joueur = exemplaires.id_joueur
INNER JOIN editions ON exemplaires.id_edition = editions.id_edition
WHERE editions.date_impression >= '2000-01-01 00:00:00' OR editions.nombre_de_tirage < 100
GROUP BY joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo
ORDER BY nbCartes DESC;

-------------------------- OU --------------------------------

SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) as nbCartes
            FROM Joueurs
            INNER JOIN Exemplaires ON Joueurs.id_joueur = Exemplaires.id_joueur
            INNER JOIN Editions ON Exemplaires.id_edition = Editions.id_edition
            WHERE Exemplaires.effet_impression IN ('Rare','Ultra Rare','Chromatique', 'X', 'Collector')
            GROUP BY Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY nbCartes DESC;

-- 8a liste des familles de carte, avec, pour chaque famille, la caractéristique dans laquelle cette famille a le meilleur niveau.
SELECT DISTINCT t1.famille, t1.type_caracteristique, t1.valeur_caracteristique
            FROM Cartes_Caracteristiques_Valeurs t1
            INNER JOIN (
                  SELECT famille, type_caracteristique, MAX(CAST(valeur_caracteristique AS UNSIGNED)) AS MaxVal
                  FROM Cartes_Caracteristiques_Valeurs
                  GROUP BY famille
            ) MaxTable
            ON t1.famille = MaxTable.famille
            WHERE CAST(t1.valeur_caracteristique AS UNSIGNED) = MaxTable.MaxVal;

-- ajout,select,delete : trivial

-- supplémentaires

-- Liste des joueurs et leur némésis

SELECT Joueur1 AS Joueur, Joueur2 AS Adversaire_le_plus_vaincu, Victoires AS Nombre_de_victoires_enregistre
            FROM Joueurs_Adversaires_Victoires AS Result
            WHERE (Joueur1, Joueur2, Victoires) NOT IN (
                SELECT Recap.Joueur1, Recap.Joueur2, Recap.Victoires
                FROM Joueurs_Adversaires_Victoires AS Recap
                INNER JOIN Joueurs_Adversaires_Victoires Jointure
                  ON Recap.Joueur1 = Jointure.Joueur1
                  AND Recap.Victoires < Jointure.Victoires
           )
           ORDER BY Nombre_de_victoires_enregistre desc;

-- Classement des joueurs selon leur nombre de défaites

SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) AS Nb_defaites
            FROM Joueurs
            INNER JOIN Decks on Joueurs.id_joueur = Decks.id_joueur
            INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
            INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
            WHERE Parties.resultat = 'DEFAITE'
            GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY Nb_defaites desc;

-- Nombre de victoires contre les opposants
SELECT *
            FROM Joueurs_Adversaires_Victoires
            ORDER BY Victoires desc;

-- winrate des joueurs

SELECT Total.Joueur1 AS Joueur, CONCAT(ROUND(Wins * 100 / Games, 2), '%') AS WinRate
            FROM (
                (
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, COUNT(*) AS Games
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                GROUP BY Joueur1
            ) Total
            LEFT JOIN (
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, COUNT(*) AS Wins
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                WHERE resultat = 'VICTOIRE'
                GROUP BY Joueur1
            ) Victoires
            ON Total.Joueur1 = Victoires.Joueur1)
            ORDER BY WinRate desc;
