<?php

include "../connect.php";

$requete = "SELECT Recap.Joueur1, Recap.Joueur2, Recap.Victoires AS Max
            FROM (
                SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, CONCAT(J2.nom, ' ', J2.prenom) AS Joueur2, COUNT(*) AS Victoires
                FROM Joueurs J1
                INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                INNER JOIN Joueurs J2 ON Parties.adversaire = J2.id_joueur
                WHERE resultat = 'VICTOIRE'
                GROUP BY Joueur1, Joueur2
                   ) AS Recap
            INNER JOIN ( SELECT Joueur1, Joueur2,  MAX(Victoires) AS Max_victoires
                         FROM Recap
                         GROUP BY Joueur1, Joueur2
                        ) RecapMax
                        ON Recap.Joueur1 = RecapMax.Joueur1
                        AND Recap.Joueur2 = RecapMax.Joueur2
                        AND Recap.Victoires = RecapMax.Max_victoires
            ORDER BY Recap.Joueur1";


select t1.id, t1.[state] MaxValue
from yourtable t1
inner join
(
  select id, max(value) MaxVal
  from yourtable
  group by id
) t2
  on t1.id = t2.id
  and t1.value = t2.maxval
order by t1.id

if($res = $connection->query($requete))
/* ... on récupère un tableau stockant le résultat */
 while ($joueur =  $res->fetch_assoc()) {
   echo "\t".'<tr><td>'.$joueur['nom'].'</td>';
   echo '<td>'.$joueur['prenom'].'</td>';
   echo '<td>'.$joueur['pseudo'].'</td>';
   echo '<td>'.$joueur['Nb_victoires'].'</td>';
   echo '</tr>'."\n";
 }
  /*liberation de l'objet requete:*/
  $res->free();
  /*fermeture de la connexion avec la base*/
  $connection->close();

?>