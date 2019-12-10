<?php
include "Header.php";
include "connect.php";

/* si on a donne en GET un tournoi en particulier on va chercher les parties associees */
if(isset($_GET["id"])) {
  $id_tournoi = $_GET["id"];
  showPartiesTournoi($id_tournoi);
} else {
  showAllTournois();
}

/* Afficher tous les tournois */
function showAllTournois() {
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
            echo "<a href=\"/tournoi.php?id=". $tournoi["id_tournoi"] ."\">Parties du tournoi</a>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher toutes les parties d'un tournois donné en GET */
function showPartiesTournoi($id) {
  $requete="SELECT Joueurs.nom as NomJ1, Joueurs.prenom as PrenomJ1, Parties.adversaire as J2, Parties.resultat, Parties.id_partie
            FROM Tournois
            INNER JOIN Parties ON parties.id_tournoi = Tournois.id_tournoi
            INNER JOIN Partie_utilise_deck ON Partie_utilise_deck.id_partie = Parties.id_partie
            INNER JOIN Decks ON Partie_utilise_deck.id_deck = Decks.id_deck
            INNER JOIN Joueurs ON Decks.id_joueur = joueurs.id_joueur
            WHERE Tournois.id_tournoi = ?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($nomJ1, $prenomJ1, $J2, $resultat, $id_partie);
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
        echo "<td>".$partie["NomJ1"]."</td>";
        echo "<td>".$partie["PrenomJ1"]."</td>";
        echo "<td>".$partie["J2"]."</td>";
        echo "<td>".$partie["resultat"]."</td>";
        echo "<td>".$partie["id_partie"]."</td>";
        echo "<a href=\"/parties.php?id=". $partie["id_partie"] ."\">Decks de la partie</a>";
        echo "</tr>";
      }
      $stmt->close();
  }
}
?>
