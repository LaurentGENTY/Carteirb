<?php
include "Header.php";
include "connect.php";

/* recherche d'une partie en particulier */
if(isset($_GET["id"])) {
  $id_partie = $_GET["id"];
  showDecksPartie($id_partie);
} else {
  showAllParties();
}

/* Afficher toutes les parties */
function showAllParties() {
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
        echo "<a href=\"/parties.php?id=". $partie["id_partie"] ."\">Decks de la partie</a>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}


/* Afficher tous els decks d'une partie donnée en GET */
function showDecksPartie($id) {
  $requete="SELECT Decks.nom_deck, Decks.id_deck, Decks.id_joueur
            FROM Decks
            INNER JOIN Partie_utilise_deck ON Partie_utilise_deck.id_deck= Decks.id_deck
            WHERE Partie_utilise_deck.id_partie = ?";

  if ($stmt = mysqli_prepare($connection, $requete)) {
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $nom, $id_deck, $joueur);

      echo "<h1>Decks de la partie ".$id."</h1>";

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">mode_edit</i>Nom deck</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id deck</th>";
      echo "<th><i class=\"material-icons\">person_add</i>Créateur</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while (mysqli_stmt_fetch($stmt)) {
        echo "<tr>";
        echo "<td>".$nom."</td>";
        echo "<td>".$id_deck."</td>";
        echo "<td>".$joueur."</td>";
        echo "</tr>";
      }
      mysqli_stmt_close($stmt);
      echo "</tbody>";
      echo "</table>";
  }
}
?>
