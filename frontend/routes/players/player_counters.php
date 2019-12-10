<?php

include "../connect.php";
      
$requete = "SELECT Joueur1 AS Joueur, Joueur2 AS Adversaire_le_plus_vaincu, Victoires AS Nombre_de_victoires_enregistré
            FROM Joueurs_Adversaires_Victoires AS Result
            WHERE (Joueur1, Joueur2, Victoires) NOT IN (
                SELECT Recap.Joueur1, Recap.Joueur2, Recap.Victoires
                FROM Joueurs_Adversaires_Victoires AS Recap
                INNER JOIN Joueurs_Adversaires_Victoires Jointure
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