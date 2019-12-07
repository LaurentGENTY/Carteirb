<?php

include "../connect.php";

$requete = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) AS Nb_cartes_rares
            FROM Joueurs
            INNER JOIN Exemplaires on Joueurs.id_joueur = Exemplaires.id_joueur
            INNER JOIN Editions on Exemplaires.id_edition = Editions.id_edition
            WHERE Editions.nombre_de_tirage < 100 OR YEAR(Exemplaires.date_impression) < 2000
            GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            ORDER BY Joueurs.nom asc";

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['nom'].'</td>';
   echo '<td>'.$joueur['prenom'].'</td>';
   echo '<td>'.$joueur['pseudo'].'</td>';
   echo '<td>'.$joueur['Nb_cartes_rares'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>