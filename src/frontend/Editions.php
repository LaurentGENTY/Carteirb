<?php
include "connect.php";
include "Header.php";

if(isset($_GET["id"])) {
  $id_edition = $_GET["id"];
  showCardsEdition($connection,$id_edition);
  add_edition($connection);
} else {
  showEditions($connection);
}

function add_edition($connection) {
?>
  <div class="row">
    <form action="AddEdition.php" class="col s12" method="post">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">title</i>
          <input placeholder="Titre de l'édition" id="titre" type="text" class="validate" name="Edition">
          <label class="active" for="titre">Titre de l'édition</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">format_list_numbered</i>
            <input  placeholder="Nombre d'impression" id="typ" type="number" class="validate" name="Impression">
            <label class="active" for="typ">Nombre d'impression</label>
          </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">date_range</i>
          <input  placeholder="Date de l'impression" id="nat" type="text" class="validate" name="Date">
          <label class="active" for="nat">Date de l'impression</label>
        </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Ajouter une édition
          <i class="material-icons right">add</i>
        </button>
        </form>
      </div>
  <?php


}

/* Afficher tous les decks de la BD */
function showEditions($connection) {
    echo "<h1>Ajout d'une édition</h1>";
    add_edition($connection);
    echo "<h1>Liste des éditions</h1>";
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
            echo "<td>".date($edition["date_impression"])."</td>";
            echo "<td><a href=\"/Editions.php?id=". $edition["id_edition"]  ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                      <a href=\"/DeleteEdition.php?id=".$edition["id_edition"] ."\"><i class=\"material-icons\">delete</i></a>
                      <a href=\"/AddCardEdition.php?id=".$edition["id_edition"] ."\"><i class=\"material-icons\">add</i></a></td>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher toutes les parties d'un tournois donné en GET */
function showCardsEdition($connection,$id) {
  $requete="SELECT Cartes.titre, Cartes.image, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille
            FROM Cartes
            INNER JOIN Carte_est_edition ON Carte_est_edition.id_carte = Cartes.id_carte
            INNER JOIN Editions ON Editions.id_edition = Carte_est_edition.id_edition
            WHERE Editions.id_edition = ?";

  echo "<h1> Cartes de l'édition ".$id."</h1>";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($titre, $image, $id_carte, $type, $nature, $famille);
      $stmt->execute();

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Titre</th>";
      echo "<th><i class=\"material-icons\">insert_photo</i>Image</th>";
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
        echo "<td><img src=\"".$image."\" style=\"width:50%;height:121px;\"/></td>";
        echo "<td>".$id_carte."</td>";
        echo "<td>".$type."</td>";
        echo "<td>".$nature."</td>";
        echo "<td>".$famille."</td>";
        echo "<td><a href=\"/Cards.php?id=". $id_carte ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/DeleteCard.php?id=".$id_carte."\"><i class=\"material-icons\">delete</i></a>
                  <a href=\"/AddCardToDeck.php?id=".$id_carte."\"><i class=\"material-icons\">add</i></a></td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      $stmt->close();
  }
}
include "Footer.php";

?>
