<?php /* testé */

include "../connect.php";

$requete = "SELECT * FROM Cartes";

 if($res = $connection->query($requete))
 /* ... on récupère un tableau stockant le résultat */
    while ($carte =  $res->fetch_assoc()) {
      echo "\t".'<tr><td>'.$carte['titre'].'</td>';
        echo '<td>'.$carte['id_carte'].'</td>';
      echo '<td>'.$carte['type'].'</td>';
      echo '<td>'.$carte['nature'].'</td>';
      echo '<td>'.$carte['famille'].'</td>';
      echo '</tr>'."\n";
    }
     /*liberation de l'objet requete:*/
     $res->free();
     /*fermeture de la connexion avec la base*/
     $connection->close();

 ?>