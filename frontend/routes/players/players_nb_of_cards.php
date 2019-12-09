<?php /* testé */

include "../connect.php";

$requete = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) AS Nb_cartes
            FROM Joueurs
            INNER JOIN Exemplaires on Joueurs.id_joueur = Exemplaires.id_joueur
            GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY Nb_cartes desc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['nom'].'</td>';
   echo '<td>'.$joueur['prenom'].'</td>';
   echo '<td>'.$joueur['pseudo'].'</td>';
   echo '<td>'.$joueur['Nb_cartes'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>