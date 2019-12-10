<?php

include "../connect.php";

$requete = "SELECT Joueur1 AS Joueur, Joueur2 AS Adversaire_le_plus_vaincu, Victoires AS Nombre_de_victoires_enregistré
            FROM (
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, CONCAT(J2.nom, ' ', J2.prenom) AS Joueur2, COUNT(*) AS Victoires
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                INNER JOIN Joueurs J2 ON Parties.adversaire = J2.id_joueur
                WHERE resultat = 'VICTOIRE'
                GROUP BY Joueur1, Joueur2
                   ) AS Result
            WHERE (Joueur1, Joueur2, Victoires) NOT IN (
                SELECT Recap.Joueur1, Recap.Joueur2, Recap.Victoires
                FROM (
                  SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, CONCAT(J2.nom, ' ', J2.prenom) AS Joueur2, COUNT(*) AS Victoires
                  FROM Joueurs J1
                  INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                  INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                  INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                  INNER JOIN Joueurs J2 ON Parties.adversaire = J2.id_joueur
                  WHERE resultat = 'VICTOIRE'
                  GROUP BY Joueur1, Joueur2
                ) AS Recap
            INNER JOIN ( 
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, CONCAT(J2.nom, ' ', J2.prenom) AS Joueur2, COUNT(*) AS Victoires
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                INNER JOIN Joueurs J2 ON Parties.adversaire = J2.id_joueur
                WHERE resultat = 'VICTOIRE'
                GROUP BY Joueur1, Joueur2
                ) Jointure
              ON Recap.Joueur1 = Jointure.Joueur1
              AND Recap.Victoires < Jointure.Victoires
           )
           ORDER BY Nombre_de_victoires_enregistré desc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['Joueur'].'</td>';
   echo '<td>'.$joueur['Adversaire_le_plus_vaincu'].'</td>';
   echo '<td>'.$joueur['Nombre_de_victoires_enregistré'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>