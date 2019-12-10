<?php
include "Header.php";
include "connect.php";

/* si on a donne en GET un tournoi en particulier on va chercher les parties associees */
if(isset($_GET["id"])) {
  $id_tournoi = $_GET["id"];
  showPartiesTournoi($connection,$id_tournoi);
} else {
  showAllTournois($connection);
}

/* Afficher tous les tournois */
function showAllTournois($connection) {
  $requete="SELECT Tournois.id_tournoi, Tournois.lieu, Tournois.date_tournoi, Tournois.type_tournoi
            FROM Tournois;";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">merge_type</i>Type</th>";
      echo "<th><i class=\"material-icons\">place</i>Lieu</th>";
      echo "<th><i class=\"material-icons\">date_range</i>Date</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id tournoi</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while ($tournoi = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$tournoi["type_tournoi"]."</td>";
            echo "<td>".$tournoi["lieu"]."</td>";
            echo "<td>".$tournoi["date_tournoi"]."</td>";
            echo "<td>".$tournoi["id_tournoi"]."</td>";
            echo "<td><a href=\"/Tournois.php?id=". $tournoi["id_tournoi"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                      <a href=\"/DeleteTournoi.php?id=".$tournoi["id_tournoi"]."\"><i class=\"material-icons\">delete</i></a>
                      <a href=\"/AddPartiesToTournoi.php?id=".$tournoi["id_tournoi"]."\"><i class=\"material-icons\">add</i></a></td>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher toutes les parties d'un tournois donné en GET */
function showPartiesTournoi($connection,$id) {
  $requete="SELECT Joueurs.nom, Joueurs.prenom, Parties.adversaire, Parties.resultat, Parties.id_partie
            FROM Tournois
            INNER JOIN Parties ON Parties.id_tournoi = Tournois.id_tournoi
            INNER JOIN Partie_utilise_deck ON Partie_utilise_deck.id_partie = Parties.id_partie
            INNER JOIN Decks ON Partie_utilise_deck.id_deck = Decks.id_deck
            INNER JOIN Joueurs ON Decks.id_joueur = Joueurs.id_joueur
            WHERE Tournois.id_tournoi = ?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($nom, $prenom, $adv, $resultat, $id_partie);
      $stmt->execute();

      echo "<h1> Parties du tournois ".$id."</h1>";

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">person</i>Nom joueur 1</th>";
      echo "<th><i class=\"material-icons\">person</i>Prénom joueur 1</th>";
      echo "<th><i class=\"material-icons\">person_outline</i>Adversaire</th>";
      echo "<th><i class=\"material-icons\">flag</i>Résultat</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id partie</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>".$nom."</td>";
        echo "<td>".$prenom."</td>";
        echo "<td>".$adv."</td>";
        echo "<td>".$resultat."</td>";
        echo "<td>".$id_partie."</td>";
        echo "<td><a href=\"/Parties.php?id=". $id_partie ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/DeleteParties.php?id=".$id_partie."\"><i class=\"material-icons\">delete</i></a>
                  <a href=\"/AddParties.php?id=".$id_partie."\"><i class=\"material-icons\">add</i></a></td>";
        echo "</tr>";
      }
      $stmt->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";

?>
