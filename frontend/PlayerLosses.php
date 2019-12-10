<?php
include "connect.php";
include "Header.php";

showClassementLoses($connection);

/* Afficher les joueurs selon leur nombre de cartes rares */
function showClassementLoses($connection) {

  $requete = "SELECT Joueurs.nom, Joueurs.prenom, Joueurs.pseudo, COUNT(*) AS Nb_defaites
              FROM Joueurs
              INNER JOIN Decks on Joueurs.id_joueur = Decks.id_joueur
              INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
              INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
              WHERE Parties.resultat = 'DEFAITE'
              GROUP BY Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
              ORDER BY Nb_defaites desc";

  echo "<h1> Classement des joueurs selon leur nombre de défaites</h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
    echo "<th><i class=\"material-icons\">person_outline</i>Prenom</th>";
    echo "<th><i class=\"material-icons\">title</i>Pseudo</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre de défaites</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

      while ($joueur = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$joueur["nom"]."</td>";
        echo "<td>".$joueur["prenom"]."</td>";
        echo "<td>".$joueur["pseudo"]."</td>";
        echo "<td>".$joueur["Nb_defaites"]."</td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
