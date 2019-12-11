<?php
include "connect.php";
include "Header.php";

showRaresClassement($connection);

/* Afficher les joueurs selon leur nombre de cartes rares */
function showRaresClassement($connection) {

  $requete = "SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) as nbCartes
              FROM Joueurs
              INNER JOIN Exemplaires ON Joueurs.id_joueur = Exemplaires.id_joueur
              INNER JOIN Editions ON Exemplaires.id_edition = Editions.id_edition
              WHERE Exemplaires.effet_impression IN ('Rare','Ultra Rare','Chromatique', 'X', 'Collector')
              GROUP BY Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
              ORDER BY nbCartes DESC;";

  echo "<h1> Classement selon le nombre de rares</h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
    echo "<th><i class=\"material-icons\">person_outline</i>Prenom</th>";
    echo "<th><i class=\"material-icons\">title</i>Pseudo</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre de cartes rares</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

      while ($joueur = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$joueur["nom"]."</td>";
        echo "<td>".$joueur["prenom"]."</td>";
        echo "<td>".$joueur["pseudo"]."</td>";
        echo "<td>".$joueur["nbCartes"]."</td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
