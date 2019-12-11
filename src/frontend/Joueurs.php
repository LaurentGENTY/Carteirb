<?php
include "connect.php";
include "Header.php";

?>

<div class="collection">
  <a class="waves-effect waves-light btn" href="/PlayerCounters.php"><i class="material-icons left">clear</i>Pire ennemis</a>
  <a class="waves-effect waves-light btn" href="/PlayerWR.php"><i class="material-icons left">fingerprint</i>Winrates</a>
  <a class="waves-effect waves-light btn" href="/PlayerLosses.php"><i class="material-icons left">format_list_numbered</i>Nombre de défaites</a>
  <a class="waves-effect waves-light btn" href="/PlayerNoGames.php"><i class="material-icons left">clear</i>Joueurs sans parties</a>
  <a class="waves-effect waves-light btn" href="/PlayerCollectionValue.php"><i class="material-icons left">format_list_numbered</i>Classement collections</a>
  <a class="waves-effect waves-light btn" href="/PlayerWithMostRares.php"><i class="material-icons left">grade</i>Classement nombre rares</a>
  <a class="waves-effect waves-light btn" href="/PlayerNbVictoriesOpponent.php"><i class="material-icons left">grade</i>Nombre de victoires contre chaque joueur</a>

</div>

<?php

if(isset($_GET["id"])) {
  $id_joueur = $_GET["id"];
  showJoueur($connection,$id_joueur);
} else {
  add_joueur($connection);
  showJoueurs($connection);
}

function add_joueur($connection) {
?>
  <h1> Ajout d'un joueur </h1>
  <div class="row">
    <form action="/AddJoueur.php" class="col s12" method="post">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">person</i>
          <input placeholder="Nom du joueur" id="nom" type="text" class="validate" name="nom">
          <label class="active" for="nom">Nom du joueur</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">person_outline</i>
            <input  placeholder="Prenom du joueur" id="prenom" type="text" class="validate" name="prenom">
            <label class="active" for="prenom">Prenom du joueur</label>
          </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">title</i>
          <input  placeholder="Pseudo du joueur" id="pseudo" type="text" class="validate" name="pseudo">
          <label class="active" for="pseudo">Pseudo du joueur</label>
        </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Enregistrer
          <i class="material-icons right">send</i>
        </button>
        </form>
      </div>
      <?php
}

/* Afficher tous les decks de la BD */
function showJoueurs($connection) {
    echo "<h1>Liste des joueurs </h1>";
  $requete="SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(Exemplaires.id_exemplaire) as nbExemplaires
            FROM Joueurs
            LEFT JOIN Exemplaires ON Joueurs.id_joueur = Exemplaires.id_joueur
            GROUP BY Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo;";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
      echo "<th><i class=\"material-icons\">person_outline</i>Prenom</th>";
      echo "<th><i class=\"material-icons\">title</i>Pseudo</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre de cartes</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($joueur = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$joueur["nom"]."</td>";
            echo "<td>".$joueur["prenom"]."</td>";
            echo "<td>".$joueur["pseudo"]."</td>";
            echo "<td>".$joueur["nbExemplaires"]."</td>";
            echo "<td><a href=\"/Exemplaires.php?id=". $joueur["id_joueur"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                      <a href=\"/DeleteJoueurs.php?id=". $joueur["id_joueur"] ."\"><i class=\"material-icons\">delete</i></a></td>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher les cartes d'un joueur */
function showJoueur($connection,$id) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, COUNT(Cartes.id_carte) AS nb, Cartes.type_carte, Cartes.nature, Cartes.famille, Cartes.image
            FROM Cartes
            INNER JOIN Exemplaires ON Cartes.id_carte = Exemplaires.id_carte
            WHERE Exemplaires.id_joueur = ?
            GROUP BY Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille, Cartes.image
            ORDER BY nb DESC";

  echo "<h1> Cartes du joueurs ".$id."</h1>";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($titre, $id_carte, $nb, $type, $nature, $famille, $image);
      $stmt->execute();

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Titre</th>";
      echo "<th><i class=\"material-icons\">insert_photo</i>Image</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id carte</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre exemplaires</th>";
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
        echo "<td>".$nb."</td>";
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
