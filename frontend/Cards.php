<?php
include "connect.php";
include "Header.php";

?>

<div class="collection">
  <a class="waves-effect waves-light btn" href="/Pickrate.php"><i class="material-icons left">show_chart</i>Pick Rate des cartes</a>
  <a class="waves-effect waves-light btn" href="/CardsNoDeck.php"><i class="material-icons left">clear</i>Cartes dans aucun deck</a>
  <a class="waves-effect waves-light btn" href="/CardsUsedByPlayers.php"><i class="material-icons left">format_list_numbered</i>Nombre utilisations</a>
</div>

<?php

if(isset($_GET["id"])) {
  $id_card = $_GET["id"];
  showCard($connection,$id_card);
} else {
  AddCardsForm($connection);
  showCards($connection);
}

function AddCardsForm($connection){
  ?>
  <h1> Ajout d'une carte </h1>
  <div class="row">
    <form action="/AddCard.php" class="col s12" method="post">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">title</i>
          <input placeholder="Titre de la carte" id="titre" type="text" class="validate" name="title">
          <label class="active" for="titre">Titre de la carte</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">merge_type</i>
            <input  placeholder="Type de la carte" id="typ" type="text" class="validate" name="Type">
            <label class="active" for="typ">Type de la carte</label>
          </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">whatshot</i>
          <input  placeholder="Nature de la carte" id="nat" type="text" class="validate" name="nature">
          <label class="active" for="nat">Nature de la carte</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">apps</i>
            <input  placeholder="Famille de la carte" id="fam" type="text" class="validate" name="family">
            <label class="active" for="fam">Famille de la carte</label>
        </div>
      </div>
        <div class="row">
          <div class="input-field col s6">
              <i class="material-icons prefix">insert_link</i>
              <input  placeholder="Image de la carte" id="im" type="text" class="validate" name="URL">
              <label class="active" for="im">Lien de l'image de la carte</label>
            </div>
          </div>
    <button class="btn waves-effect waves-light" type="submit">Enregistrer
      <i class="material-icons right">send</i>
    </button>
    </form>
  </div>
      <?php
}

/* Afficher tous les cartes de la BD */
function showCards($connection) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille
            FROM Cartes;";

  if ($res = $connection->query($requete)) {

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
        echo "<td><a href=\"/Cards.php?id=". $card["id_carte"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/DeleteCard.php?id=".$card["id_carte"]."\"><i class=\"material-icons\">delete</i></a>
                  <a href=\"/AddCardToDeck.php?id=".$card["id_carte"]."\"><i class=\"material-icons\">add</i></a></td>";
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

      $requete_caracs="SELECT DISTINCT Caracteristiques.type_caracteristique, Caracteristiques.valeur_caracteristique, Caracteristiques.id_caracteristique
                    FROM Cartes
                    INNER JOIN Carte_a_caracteristique ON Cartes.id_carte = Carte_a_caracteristique.id_carte
                    INNER JOIN Caracteristiques ON Carte_a_caracteristique.id_caracteristique = Caracteristiques.id_caracteristique
                    WHERE Cartes.id_carte = ?";


      if ($stmt = $connection->prepare($requete_caracs)) {

          $stmt->bind_param('i', $card);
          $stmt->bind_result($type, $valeur, $id_carac);
          $stmt->execute();

          echo "<table>";
          echo "<thead>";

          echo "<tr>";
          echo "<th><i class=\"material-icons\">merge_type</i>Type Caracteristique</th>";
          echo "<th><i class=\"material-icons\">format_list_numbered</i>Valeur Caracteristique</th>";
          echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";

          while($stmt->fetch()) {
            echo "<tr>";
            echo "<td>".$type."</td>";
            echo "<td>".$valeur."</td>";
            echo "<td><a href=\"/DeleteCaracteristique.php?id_carac=".$id_carac."\"><i class=\"material-icons\">delete</i></a>";
            echo "</tr>";
          }

          echo "</tbody>";
          echo "</table>";
          echo "</div>";
          echo "</div>";
          $stmt->close();
      }
  }
}

?>
