<?php

include "../connect.php";

$requete = "SELECT Utilisations.titre AS Carte, CONCAT(ROUND(Nb_utilisations * 100 / Nb_decks, 2), '%') AS PickRate
            FROM (
                (
                SELECT Cartes.id_carte, id_deck, titre, COUNT(*) AS Nb_utilisations
                FROM Cartes
                INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
                GROUP BY Cartes.id_carte
            ) Utilisations
            INNER JOIN (
                SELECT id_deck, COUNT(*) AS Nb_decks 
                FROM Decks
            ) TotalDecks
            ON Utilisations.id_deck = TotalDecks.id_deck)
            ORDER BY Nb_utilisations * 100 / Nb_decks desc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
    echo "\t".'<tr><td>'.$carte['Carte'].'</td>';
    echo '<td>'.$carte['PickRate'].'</td>';
    echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>