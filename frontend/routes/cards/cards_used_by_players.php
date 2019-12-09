<?php /* testé */

include "../connect.php";

$requete = "SELECT Cartes.id_carte, Cartes.titre, Cartes.type_carte, Cartes.nature, Cartes.famille, COUNT(Joueurs.id_joueur) AS nbJoueurs
            FROM Cartes
            INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
            INNER JOIN Decks ON Deck_contient_carte.id_Deck = Decks.id_Deck
            INNER JOIN Joueurs ON Decks.id_joueur = Joueurs.id_joueur
            GROUP BY Cartes.id_carte, Cartes.titre, Cartes.type_carte, Cartes.nature, Cartes.famille
            ORDER BY nbJoueurs DESC";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['id_carte'].'</td>';
   echo '<td>'.$carte['titre'].'</td>';
   echo '<td>'.$carte['type_carte'].'</td>';
   echo '<td>'.$carte['nature'].'</td>';
   echo '<td>'.$carte['famille'].'</td>';
   echo '<td>'.$carte['Nb_utilisateurs'].'</td>'
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>