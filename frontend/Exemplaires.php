<?php
include "connect.php";
include "Header.php";

if(isset($_GET["id"])) {
  $id_joueur = $_GET["id"];
  showExemplaireJoueur($connection,$id_joueur);
} else {
  header('Location: /Cards.php');
  exit();
}



/* Afficher les cartes dun joueur */
function showExemplaireJoueur($connection,$id_joueur) {
  $requete="SELECT Cartes.titre, Editions.nom_edition, Editions.id_edition, Exemplaires.date_acquisition, Exemplaires.mode_acquisition, Exemplaires.date_perte, Exemplaires.qualite, Exemplaires.effet_impression, Cartes.id_carte, Exemplaires.id_exemplaire
            FROM Cartes
            INNER JOIN Exemplaires ON Cartes.id_carte = Exemplaires.id_carte
            INNER JOIN Editions ON Exemplaires.id_edition = Editions.id_edition
            WHERE Exemplaires.id_joueur = ?";

  echo "<h1> Exemplaires de cartes du joueur ".$id_joueur."</h1>";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id_joueur);
      $stmt->bind_result($titre, $nom_edition, $id_edition, $date_a, $mode_a, $date_p, $qualite, $effet, $id_carte, $id_exemplaire);
      $stmt->execute();

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Titre</th>";
      echo "<th><i class=\"material-icons\">title</i>Nom edition </th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Lien édition </th>";
      echo "<th><i class=\"material-icons\">date_range</i>Date acquisition</th>";
      echo "<th><i class=\"material-icons\">details</i>Mode acquisition</th>";
      echo "<th><i class=\"material-icons\">date_range</i>Date perte</th>";
      echo "<th><i class=\"material-icons\">high_quality</i>Qualite</th>";
      echo "<th><i class=\"material-icons\">wb_sunny</i>Effet</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Lien Carte</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>".$titre."</td>";
        echo "<td>".$nom_edition."</td>";
        echo "<td><a href=\"/Editions.php?id=". $id_edition ."\"><i class=\"material-icons\">call_missed_outgoing</i></a></td>";
        echo "<td>".$date_a."</td>";
        echo "<td>".$mode_a."</td>";
        echo "<td>".$date_p."</td>";
        echo "<td>".$qualite."</td>";
        echo "<td>".$effet."</td>";
        echo "<td><a href=\"/Cards.php?id=". $id_carte ."\"><i class=\"material-icons\">pageview</i></a>
                  <a href=\"/DeleteExemplaire.php?id=". $id_exemplaire ."&id_joueur=". $id_joueur."\"><i class=\"material-icons\">delete</i></a></td>";
        echo "</tr>";
      }
      $stmt->close();
      echo "</tbody>";
      echo "</table>";
    }
}

?>
