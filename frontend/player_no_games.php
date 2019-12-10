<?php
include "connect.php";
include "Header.php";

showJoueursNoGames($connection);

/* Afficher tous les decks de la BD */
function showJoueursNoGames($connection) {

  $requete = "SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
              FROM Joueurs
              WHERE Joueurs.id_joueur NOT IN (
                 SELECT Joueurs.id_joueur
                 FROM Joueurs
                 INNER JOIN Decks on Joueurs.id_joueur = Decks.id_joueur
                 INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
              );";

  echo "<h1> Joueurs sans parties </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
    echo "<th><i class=\"material-icons\">person_outline</i>Prenom</th>";
    echo "<th><i class=\"material-icons\">title</i>Pseudo</th>";
    echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

      while ($joueur = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$joueur["nom"]."</td>";
        echo "<td>".$joueur["prenom"]."</td>";
        echo "<td>".$joueur["pseudo"]."</td>";
        echo "<td><a href=\"/Exemplaires.php?id=". $joueur["id_joueur"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/deleteJoueurs.php?id=". $joueur["id_joueur"] ."\"><i class=\"material-icons\">delete</i></a></td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
