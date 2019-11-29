<?php

include "connect.php"

$requete = "SELECT * FROM Decks INNER JOIN Utilisateurs USING(id_joueur)"

 if($res = $connection->query($requete))
 /* ... on récupère un tableau stockant le résultat */
    while ($deck =  $res->fetch_assoc()) {
      echo "\t".'<tr><td>'.$deck['nom_deck'].'</td>';
      echo '<td>'.$deck['id_deck'].'</td>';
      echo '<td>'.$deck['nom'].'</td>';
      echo '<td>'.$deck['prenom'].'</td>';
      echo '</tr>'."\n";
    }
     /*liberation de l'objet requete:*/
     $res->free();
     /*fermeture de la connexion avec la base*/
     $connection->close();

 ?>