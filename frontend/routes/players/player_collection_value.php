<?php /* testé */

include "../connect.php";

$requete = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, SUM(Exemplaires.qualite * Carte_est_edition.cote) AS Valeur_de_la_collection
            FROM Joueurs
            INNER JOIN Exemplaires on Joueurs.id_joueur = Exemplaires.id_joueur
            INNER JOIN Editions on Exemplaires.id_edition = Editions.id_edition
            INNER JOIN Carte_est_edition ON Editions.id_edition = Carte_est_edition.id_edition
            GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY Valeur_de_la_collection desc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['nom'].'</td>';
   echo '<td>'.$joueur['prenom'].'</td>';
   echo '<td>'.$joueur['pseudo'].'</td>';
   echo '<td>'.$joueur['Valeur_de_la_collection'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?> 