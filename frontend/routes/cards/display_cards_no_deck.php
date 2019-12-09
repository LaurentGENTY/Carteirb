<?php /* testé */

include "../connect.php";

$requete = "SELECT Cartes.*
            FROM Cartes
            WHERE Cartes.id_carte NOT IN (
                SELECT Cartes.id_carte
                FROM Cartes
                INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
            )";

 if($res = $connection->query($requete))
 
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