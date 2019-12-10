<?php
include "connect.php";
include "Header.php";

if(isset($_GET["id"])) {
  $id_edition = $_GET["id"];
  showCardsEdition($connection,$id_edition);
} else {
  showEditions($connection);
}

/* Afficher tous les decks de la BD */
function showEditions($connection) {
  $requete="SELECT Editions.nom_edition, Editions.nombre_de_tirage, Editions.date_impression, Editions.id_edition
            FROM Editions;";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Nom edition</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre de tirage</th>";
      echo "<th><i class=\"material-icons\">date_range</i>Date d'impression</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($edition = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$edition["nom_edition"]."</td>";
            echo "<td>".$edition["nombre_de_tirage"]."</td>";
            echo "<td>".$edition["date_impression"]."</td>";
            echo "<td><a href=\"/Editions.php?id=". $edition["id_edition"] ."\">Cartes</a></td>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher toutes les parties d'un tournois donné en GET */
function showCardsEdition($connection,$id) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille
            FROM Cartes
            INNER JOIN Carte_est_edition ON Carte_est_edition.id_carte = Cartes.id_carte
            INNER JOIN Editions ON Editions.id_edition = Carte_est_edition.id_edition
            WHERE Editions.id_edition = ?";

  echo "<h1> Cartes de l'édition ".$id."</h1>";
  
  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($titre, $id_carte, $type, $nature, $famille);
      $stmt->execute();

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Titre</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id carte</th>";
      echo "<th><i class=\"material-icons\">merge_type</i>Type</th>";
      echo "<th><i class=\"material-icons\">whatshot</i>Nature</th>";
      echo "<th><i class=\"material-icons\">apps</i>Famille</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>".$titre."</td>";
        echo "<td>".$id_carte."</td>";
        echo "<td>".$type."</td>";
        echo "<td>".$nature."</td>";
        echo "<td>".$famille."</td>";
        echo "<td><a href=\"/Cards.php?id=". $id_carte ."\">Voir Carte</a></td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      $stmt->close();
  }
}

?>
