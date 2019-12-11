<?php
include "connect.php";
include "Header.php";

showCollectionValue($connection);

/* Afficher tous les decks de la BD */
function showCollectionValue($connection) {

  $requete = "SELECT *
              FROM Joueurs_Adversaires_Victoires
              ORDER BY Victoires desc";

  echo "<h1> Nombre de victoires contre les opposants</h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
    echo "<th><i class=\"material-icons\">person_outline</i>Adversaire</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre de victoires</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

      while ($joueur = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$joueur["Joueur1"]."</td>";
        echo "<td>".$joueur["Joueur2"]."</td>";
        echo "<td>".$joueur["Victoires"]."</td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
