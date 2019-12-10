<?php
include "connect.php";
include "Header.php";

echo "<div width=\"50%\"><a class=\"waves-effect waves-light btn\" href=\"/Pickrate.php\"><i class=\"material-icons left\">show_chart</i>Pick Rate des cartes</a></div>";


if(isset($_GET["id"])) {
  $id_card = $_GET["id"];
  showCard($connection,$id_card);
} else {
  showCards($connection);
}


/* Afficher tous les cartes de la BD */
function showCards($connection) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille
            FROM Cartes;";

  //echo "<h1>Liste des cartes</h1>";

  if ($res = $connection->query($requete)) {
    echo "<script>";
    echo "$(document).ready(function() {";
    echo "$('select').material_select();";
    echo "});";
    echo "</script>";

    echo "<h1> Ajouter une carte </h1>";
    echo "<p>";
    echo "Type de carte (à choisir avant la suite) :";
      //echo "  <form action='#' method='post'>";
      echo "<div class='input-field col s12'>";
      echo "     <select name='type'>";
      echo "          <option selected='default'> </option>";
      echo "          <option value='Monstre'> Monstre </option>";
      echo "          <option value='Magie'> Magie </option>";
      echo "          <option value='Piège'> Piège </option>";
      echo "          <option value='Terrain'> Terrain </option>";
      echo "      </select> <label> Type </label> <br/>";
      echo "</div>";


  //  echo "      <input type='submit' name='submit' value='Valider le type' />";
      //echo "  </form>";


        if(!empty($_POST["type"]))
        if($_POST["type"] == "Monstre"){
            echo "Attaque :";
            echo "<input type='number' name='Attaque'/>";
            echo "</br>";
            echo "Défense :";
            echo "<input type='number' name='Defense' />";
            echo "</br>";
        }

        echo "</p>";
        echo "<p> Titre :";
        echo "  <form action='add_card.php' method='post'>";
        echo "    <input type='text' name='title'/> <br/>";
        echo "    Nature :";
        echo "    <input type='text' name='nature'/> <br/>";
        echo "    Famille :";
        echo "    <input type='text' name='family'/> <br/>";
        echo "    Type :";
        echo "    <input type='text' name='Type' hidden placeholder=".$_POST['type'];
        echo '/>';
            echo $_POST["type"]. "<br/>";
            echo "<input type='submit' name='submit' value='Valider' /></form>";

      echo "<h1> Modifier des cartes </h1>";
      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Titre</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id carte</th>";
      echo "<th><i class=\"material-icons\">merge_type</i>Type</th>";
      echo "<th><i class=\"material-icons\">whatshot</i>Nature</th>";
      echo "<th><i class=\"material-icons\">apps</i>Famille</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";
      echo "<th><i class=\"material-icons\">delete</i>Supprimer</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($card = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$card["titre"]."</td>";
        echo "<td>".$card["id_carte"]."</td>";
        echo "<td>".$card["type_carte"]."</td>";
        echo "<td>".$card["nature"]."</td>";
        echo "<td>".$card["famille"]."</td>";
        echo "<td><a href=\"/Cards.php?id=". $card["id_carte"] ."\">Voir Carte</a></td>";
        echo "<td><a href=\"/deleteCard.php?id=".$card["id_carte"]."\"> <i class=\"material-icons\">delete</i></a></td>";
        echo "</tr>";
      }

      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher toutes les cartes données en GET */
function showCard($connection,$id) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille, Cartes.image
            FROM Cartes
            WHERE Cartes.id_carte = ?";

  echo "<h1> Détail de la carte ".$id."</h1>";
  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($titre, $id_carte, $type, $nature, $famille, $image);
      $stmt->execute();

      $card = "";

      ?>
      <div class="row">
        <div class="col s5">
      <?php

      while($stmt->fetch()) {
        $card = $id_carte;

        ?>
            <div class="card">
              <div class="card-image">
                <img src="<?php echo $image ?>">
                <span class="card-title"> <?php echo $titre ?> </span>
              </div>
              <div class="card-content">
                <ul class="collection with-header">
                  <li class="collection-header"><h4>Infos</h4></li>
                  <li class="collection-item"><div> <?php echo $titre ?> <a href="#!" class="secondary-content"><i class="material-icons">title</i></a></div></li>
                  <li class="collection-item"><div> <?php echo $id_carte ?> <a href="#!" class="secondary-content"><i class="material-icons">format_list_numbered</i></a></div></li>
                  <li class="collection-item"><div> <?php echo $type ?> <a href="#!" class="secondary-content"><i class="material-icons">merge_type</i></a></div></li>
                  <?php if(!is_null($nature)) {
                    echo "<li class=\"collection-item\"><div>".$nature."<a class=\"secondary-content\"><i class=\"material-icons\">whatshot</i></a></div></li>";
                  } ?>
                  <li class="collection-item"><div> <?php echo $famille ?> <a href="#!" class="secondary-content"><i class="material-icons">apps</i></a></div></li>
                </ul>
              </div>
              <div class="card-action">
                <a href="/Cards.php">Retour aux cartes</a>
              </div>
            </div>
        <?php
      }

      ?> </div>
        <div class="col s7">
      <?php

      $requete_caracs="SELECT DISTINCT Caracteristiques.type_caracteristique, Caracteristiques.valeur_caracteristique
                    FROM Cartes
                    INNER JOIN Carte_a_caracteristique ON Cartes.id_carte = Carte_a_caracteristique.id_carte
                    INNER JOIN Caracteristiques ON Carte_a_caracteristique.id_caracteristique = Caracteristiques.id_caracteristique
                    WHERE Cartes.id_carte = ?";


      if ($stmt = $connection->prepare($requete_caracs)) {

          $stmt->bind_param('i', $card);
          $stmt->bind_result($type, $valeur);
          $stmt->execute();

          echo "<table>";
          echo "<thead>";

          echo "<tr>";
          echo "<th><i class=\"material-icons\">merge_type</i>Type Caracteristique</th>";
          echo "<th><i class=\"material-icons\">format_list_numbered</i>Valeur Caracteristique</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";

          while($stmt->fetch()) {
            echo "<tr>";
            echo "<td>".$type."</td>";
            echo "<td>".$valeur."</td>";
            echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
          echo "</div>";
      }
      echo "</div>";
      $stmt->close();
  }
}

?>