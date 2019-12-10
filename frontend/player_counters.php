<?php
include "connect.php";
include "Header.php";

showJoueursClassement($connection);

/* Afficher tous les decks de la BD */
function showJoueursClassement($connection) {

  $requete = "SELECT Joueur1 AS Joueur, Joueur2 AS Adversaire_le_plus_vaincu, Victoires AS Nombre_de_victoires_enregistre
              FROM Joueurs_Adversaires_Victoires AS Result
              WHERE (Joueur1, Joueur2, Victoires) NOT IN (
                  SELECT Recap.Joueur1, Recap.Joueur2, Recap.Victoires
                  FROM Joueurs_Adversaires_Victoires AS Recap
                  INNER JOIN Joueurs_Adversaires_Victoires Jointure
                    ON Recap.Joueur1 = Jointure.Joueur1
                    AND Recap.Victoires < Jointure.Victoires
             )
             ORDER BY Nombre_de_victoires_enregistre desc;";

  echo "<h1> Liste des joueurs et leur némésis </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">person</i>Joueur</th>";
      echo "<th><i class=\"material-icons\">person_outline</i>Adversaire le plus vaincu</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre victoires</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($fetch = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$fetch["Joueur"]."</td>";
            echo "<td>".$fetch["Adversaire_le_plus_vaincu"]."</td>";
            echo "<td>".$fetch["Nombre_de_victoires_enregistre"]."</td>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";

?>
