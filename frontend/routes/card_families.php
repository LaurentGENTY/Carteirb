<?php

include "../connect.php";

$requete = "SELECT GlobalTable.famille, GlobalTable.type_caracteristique, GlobalTable.valeur_caracteristique
            FROM (SELECT famille, MAX(valeur_caracteristique) as Valeur_max_caracteristique
                  FROM (SELECT *
                        FROM Cartes
                        INNER JOIN Carte_a_caracteristique ON Cartes.id_carte = Carte_a_caracteristique.id_carte
                        INNER JOIN Caracteristiques ON Carte_a_caracteristique.id_caracteristique = Caracteristiques.id_caracteristique) AS GlobalTable
                  GROUP BY famille) AS MaxTable
            INNER JOIN GlobalTable
                ON GlobalTable.famille = MaxTable.famille
                AND GlobalTable.valeur_caracteristique = MaxTable.Valeur_max_caracteristique";


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