<?php
include "Header.php";
include "connect.php";

/* recherche d'une partie en particulier */
if(isset($_GET["id"])) {
  $id_partie = $_GET["id"];
  showDecksPartie($connection,$id_partie);
} else {
  showAllParties($connection);
}

/* Afficher toutes les parties */
function showAllParties($connection) {
  $requete="SELECT Joueurs.nom as NomJ1, Joueurs.prenom as PrenomJ1, Parties.adversaire as J2, Parties.resultat, Parties.id_partie
            FROM Tournois
            INNER JOIN Parties ON parties.id_tournoi = Tournois.id_tournoi
            INNER JOIN Partie_utilise_deck ON Partie_utilise_deck.id_partie = Parties.id_partie
            INNER JOIN Decks ON Partie_utilise_deck.id_deck = Decks.id_deck
            INNER JOIN Joueurs ON Decks.id_joueur = joueurs.id_joueur";

  /* execute la requete */
  if($res = $connection->query($requete)) {
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

      while ($partie = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$partie["NomJ1"]."</td>";
        echo "<td>".$partie["PrenomJ1"]."</td>";
        echo "<td>".$partie["J2"]."</td>";
        echo "<td>".$partie["resultat"]."</td>";
        echo "<td>".$partie["id_partie"]."</td>";
        echo "<td><a href=\"/parties.php?id=". $partie["id_partie"] ."\">Decks de la partie</a></td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}


/* Afficher tous els decks d'une partie donnée en GET */
function showDecksPartie($connection,$id) {
  $requete="SELECT Decks.nom_deck, Decks.id_deck, Decks.id_joueur
            FROM Decks
            INNER JOIN Partie_utilise_deck ON Partie_utilise_deck.id_deck= Decks.id_deck
            INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
            WHERE Parties.id_partie = ?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($nom, $id_deck, $id_joueur);
      $stmt->execute();

      echo "<h1>Decks de la partie ".$id."</h1>";

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">mode_edit</i>Nom deck</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Voir Deck</th>";
      echo "<th><i class=\"material-icons\">person_add</i>Créateur</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>".$nom."</td>";
        echo "<td><a href=\"/Decks.php?id=".$id_deck."\"/>Page deck</td>";
        echo "<td><a href=\"/Joueurs.php?id=".$id_joueur."\"/>Page joueur</td>";
        echo "</tr>";
      }
      $stmt->close();
      echo "</tbody>";
      echo "</table>";
    }
}

?>
