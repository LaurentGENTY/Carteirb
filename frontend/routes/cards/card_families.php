<?php

include "../connect.php";

$requete = "SELECT t1.famille, t1.type_caracteristique, t1.valeur_caracteristique
            FROM Cartes_Caracteristiques_Valeurs t1
            INNER JOIN (
                  SELECT famille, type_caracteristique, MAX(CAST(valeur_caracteristique AS INT) AS MaxVal
                  FROM Cartes_Caracteristiques_Valeurs
                  GROUP BY famille
            ) MaxTable
            ON t1.famille = MaxTable.famille
            WHERE CAST(t1.valeur_caracteristique AS INT) = MaxTable.MaxVal";


if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$carte['famille'].'</td>';
   echo '<td>'.$carte['type_caracteristique'].'</td>';
   echo '<td>'.$carte['valeur_caracteristique'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>