<?php

   include "../connect.php";

   $requete = "SELECT *
               FROM Joueurs
               MINUS
               SELECT *
               FROM Joueurs
               INNER JOIN Deck on Joueurs.id_joueur = Deck.id_joueur
               INNER JOIN Partie_utilise_deck on Deck.id_deck = Partie_utilise_deck.id_deck";

    if($res = $connection->query($requete))
    /* ... on récupère un tableau stockant le résultat */
       while ($joueur =  $res->fetch_assoc()) {
         echo "\t".'<tr><td>'.$carte['titre'].'</td>';
           echo '<td>'.$joueur['id_carte'].'</td>';
         echo '<td>'.$joueur['type'].'</td>';
         echo '<td>'.$joueur['nature'].'</td>';
         echo '<td>'.$joueur['famille'].'</td>';
         echo '</tr>'."\n";
       }
        /*liberation de l'objet requete:*/
        $res->free();
        /*fermeture de la connexion avec la base*/
        $connection->close();

    ?>