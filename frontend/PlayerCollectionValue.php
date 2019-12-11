<?php
include "connect.php";
include "Header.php";

showCollectionValue($connection);

/* Afficher tous les decks de la BD */
function showCollectionValue($connection) {

  $requete = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, ROUND(SUM(Exemplaires.qualite / 100 * Carte_est_edition.cote), 2) AS Valeur_de_la_collection
              FROM Joueurs
              LEFT JOIN Exemplaires on Joueurs.id_joueur = Exemplaires.id_joueur
              LEFT JOIN Editions on Exemplaires.id_edition = Editions.id_edition
              LEFT JOIN Carte_est_edition ON Editions.id_edition = Carte_est_edition.id_edition
              GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
              ORDER BY Valeur_de_la_collection desc";

  echo "<h1> Classement selon la collection </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
    echo "<th><i class=\"material-icons\">person_outline</i>Prenom</th>";
    echo "<th><i class=\"material-icons\">title</i>Pseudo</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Valeur de collection</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($joueur = $res->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$joueur["nom"]."</td>";
      echo "<td>".$joueur["prenom"]."</td>";
      echo "<td>".$joueur["pseudo"]."</td>";

      if (is_null($joueur["Valeur_de_la_collection"]))
          echo "<td>0.00</td>";
      else
          echo "<td>".$joueur["Valeur_de_la_collection"]."</td>";

      echo "</tr>";
    }

      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
