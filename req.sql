-- 1 display_cards_type.php
SELECT *
FROM cartes
WHERE cartes.type_carte = 'Monstre';

-- 2 display_cards_no_deck.php
SELECT cartes.* FROM cartes EXCEPT (SELECT cartes.* FROM cartes INNER JOIN deck_contient_carte on deck_contient_carte.id_carte = cartes.id_carte);

-- 3 player_no_games.php
SELECT joueurs.* FROM joueurs EXCEPT (SELECT joueurs.* FROM joueurs INNER JOIN decks ON joueurs.id_joueur = decks.id_joueur INNER JOIN partie_utilise_deck ON partie_utilise_deck.id_deck = decks.id_deck);

-- 4 players_nb_of_cards.php
SELECT joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo, COUNT(exemplaires.id_exemplaire) as nbExemplaires FROM joueurs INNER JOIN exemplaires ON joueurs.id_joueur = exemplaires.id_joueur GROUP BY joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo);

-- 5 player_collection_value.php diff
SELECT joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo, SUM(carte_est_edition.cote * exemplaires.qualite) as valeurCollection
FROM joueurs
INNER JOIN exemplaires ON joueurs.id_joueur = exemplaires.id_joueur
INNER JOIN cartes ON exemplaires.id_carte = cartes.id_carte
INNER JOIN carte_est_edition ON cartes.id_carte = carte_est_edition.id_carte
GROUP BY joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo
ORDER BY valeurCollection DESC;

-- 6 cards_used_by_players.php
SELECT cartes.id_carte, cartes.titre, cartes.type_carte, cartes.nature, cartes.famille, COUNT(joueurs.id_joueur) AS nbJoueurs
FROM cartes
INNER JOIN deck_contient_carte ON cartes.id_carte = deck_contient_carte.id_carte
INNER JOIN decks ON deck_contient_carte.id_deck = decks.id_deck
INNER JOIN joueurs ON decks.id_joueur = joueurs.id_joueur
GROUP BY cartes.id_carte, cartes.titre, cartes.type_carte, cartes.nature, cartes.famille
ORDER BY nbJoueurs DESC;

-- 7 players_with_most_rares.php <100 ?
SELECT joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo, COUNT(exemplaires.id_exemplaire) as nbCartes
FROM joueurs
INNER JOIN exemplaires ON joueurs.id_joueur = exemplaires.id_joueur
INNER JOIN editions ON exemplaires.id_edition = editions.id_edition
WHERE editions.date_impression >= '2000-01-01 00:00:00' OR editions.nombre_de_tirage <= 50
GROUP BY joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo
ORDER BY nbCartes DESC;

-------------------------- OU --------------------------------

SELECT joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo, COUNT(exemplaires.id_exemplaire) as nbCartes
FROM joueurs
INNER JOIN exemplaires ON joueurs.id_joueur = exemplaires.id_joueur
INNER JOIN editions ON exemplaires.id_edition = editions.id_edition
WHERE exemplaires.effet_impression IN ('Rare','Ultra Rare','Chromatique', 'X', 'Collector')
GROUP BY joueurs.id_joueur, joueurs.nom, joueurs.prenom, joueurs.pseudo
ORDER BY nbCartes DESC;

-- 8
SELECT cartes.id_carte, cartes.titre, cartes.famille, caracteristiques.type_caracteristique, MAX(caracteristiques.valeur_caracteristique)
FROM caracteristiques
INNER JOIN carte_a_caracteristique ON caracteristiques.id_caracteristique = carte_a_caracteristique.id_caracteristique
INNER JOIN cartes ON carte_a_caracteristique.id_carte = cartes.id_carte
WHERE caracteristiques.type_caracteristique = 'ATK' OR caracteristiques.type_caracteristique = 'DEF'
GROUP BY cartes.id_carte, cartes.titre, cartes.famille;

-- ajout : trivial
