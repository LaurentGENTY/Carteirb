<?php
include "connect.php";
include "Header.php";

showJoueursWinrate($connection);

/* Afficher tous les decks de la BD */
function showJoueursWinrate($connection) {

  $requete = "SELECT Total.Joueur1 AS Joueur, CONCAT(ROUND(Wins * 100 / Games, 2), '%') AS WinRate
              FROM (
                  (
                  SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, COUNT(*) AS Games
                  FROM Joueurs J1
                  INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                  INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                  INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                  GROUP BY Joueur1
              ) Total
              LEFT JOIN (
                  SELECT CONCAT(J1.nom, ' ', J1.prenom) AS Joueur1, resultat, COUNT(*) AS Wins
                  FROM Joueurs J1
                  INNER JOIN Decks on J1.id_joueur = Decks.id_joueur
                  INNER JOIN Partie_utilise_deck on Decks.id_deck = Partie_utilise_deck.id_deck
                  INNER JOIN Parties ON Partie_utilise_deck.id_partie = Parties.id_partie
                  WHERE resultat = 'VICTOIRE'
                  GROUP BY Joueur1
              ) Victoires
              ON Total.Joueur1 = Victoires.Joueur1)
              ORDER BY WinRate desc";

  echo "<h1> Liste des winrates des joueurs </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">person</i>Joueur</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Winrate</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($joueur = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$joueur["Joueur"]."</td>";

            if (is_null($joueur["WinRate"]))
                echo "<td>0.00%</td>";
            else
                echo "<td>".$joueur["WinRate"]."</td>";
   
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
