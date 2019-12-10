<?php

include "../connect.php";

$requete = "SELECT Total.Joueur1 AS Joueur, CONCAT(ROUND(Wins * 100 / Games, 2), '%') AS WinRate
            FROM (
                (
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, COUNT(*) AS Games
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                GROUP BY Joueur1
            ) Total
            INNER JOIN (
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, COUNT(*) AS Wins
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                WHERE resultat = 'VICTOIRE'
                GROUP BY Joueur1 
            ) Victoires
            ON Total.Joueur1 = Victoires.Joueur1)
            ORDER BY WinRate desc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['Joueur'].'</td>';
   echo '<td>'.$joueur['WinRate'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>