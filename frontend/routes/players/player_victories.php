<?php /* testé */ 

include "../connect.php";

$requete = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) AS Nb_victoires
            FROM Joueurs
            INNER JOIN Decks on Joueurs.id_joueur = Decks.id_joueur
            INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
            INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
            WHERE Parties.resultat = 'VICTOIRE'
            GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY Nb_victoires desc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['nom'].'</td>';
   echo '<td>'.$joueur['prenom'].'</td>';
   echo '<td>'.$joueur['pseudo'].'</td>';
   echo '<td>'.$joueur['Nb_victoires'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>