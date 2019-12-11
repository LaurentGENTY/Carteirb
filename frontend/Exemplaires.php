<?php
include "connect.php";
include "Header.php";

if(isset($_GET["id"])) {
  $id_joueur = $_GET["id"];
  addExemplaire($connection,$id_joueur);
  showExemplaireJoueur($connection,$id_joueur);
} else {
  header('Location: /Cards.php');
  exit();
}

function addExemplaire($connection,$id_joueur) {
    ?>
    <h1> Ajouter un Exemplaire </h1>;
    <div class="row">
      <form action="/AddExemplaire.php" class="col s12" method="post">
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">title</i>
            <input placeholder="Titre de la carte" id="Carte" type="text" class="validate" name="Carte">
            <label class="active" for="Carte">Titre de la carte</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
              <i class="material-icons prefix">merge_type</i>
              <input  placeholder="Edition" id="Edition" type="text" class="validate" name="Edition">
              <label class="active" for="Edition">Edition</label>
            </div>
          </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons prefix">whatshot</i>
            <input  placeholder="Qualite" id="Quality" type="number" class="validate" name="Quality">
            <label class="active" for="Quality">Qualité de la carte</label>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">whatshot</i>
              <input  placeholder="Effet impression" id="ImpressionEffect" type="text" class="validate" name="ImpressionEffect">
              <label class="active" for="ImpressionEffect">Effet d'impression</label>
            </div>
            </div>
        <div class="row">
          <div class="input-field col s6">
              <i class="material-icons prefix">apps</i>
              <input  placeholder="Date acquisition" id="DateAcq" type="date" class="validate" name="DateAcq">
              <label class="active" for="DateAcq">Date d'acquisition</label>
          </div>
        </div>
          <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">insert_link</i>
                <input  placeholder="Mode acquisition" id="ModeAcq" type="text" class="validate" name="ModeAcq">
                <label class="active" for="ModeAcq">Mode d'acquisition</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                  <i class="material-icons prefix">apps</i>
                  <input  placeholder="Date de perte" id="DateLos" type="date" class="validate" name="DateLos">
                  <label class="active" for="DateLos">Date de perte </label>
              </div>
            </div>
      <button class="btn waves-effect waves-light" type="submit">Ajouter un exemplaire
        <i class="material-icons right">add</i>
      </button>
      </form>
    </div>
    <?php
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
