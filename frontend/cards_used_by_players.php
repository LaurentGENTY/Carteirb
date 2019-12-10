<?php
include "connect.php";
include "Header.php";

showNbUses($connection);

/* affiche le nb d'utilisations des cartes */
function showNbUses($connection) {

  $requete = "SELECT Cartes.id_carte, Cartes.titre, COUNT(Joueurs.id_joueur) AS nbJoueurs
              FROM Cartes
              INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
              INNER JOIN Decks ON Deck_contient_carte.id_Deck = Decks.id_Deck
              INNER JOIN Joueurs ON Decks.id_joueur = Joueurs.id_joueur
              GROUP BY Cartes.id_carte, Cartes.titre, Cartes.type_carte, Cartes.nature, Cartes.famille
              ORDER BY nbJoueurs DESC";

  echo "<h1> Cartes avec leur nombre d'utilisations </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">title</i>Titre</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Id carte</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Nombre d'utilisations</th>";
    echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

      while ($card = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$card["titre"]."</td>";
        echo "<td>".$card["id_carte"]."</td>";
        echo "<td>".$card["nbJoueurs"]."</td>";
        echo "<td><a href=\"/Cards.php?id=". $card["id_carte"] ."\">Voir Carte</a></td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
