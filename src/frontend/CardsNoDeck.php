<?php
include "connect.php";
include "Header.php";

showCardsNoDeck($connection);

/* Afficher tous les decks de la BD */
function showCardsNoDeck($connection) {

  $requete = "SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille, Cartes.image
              FROM Cartes
              WHERE Cartes.id_carte NOT IN (
                  SELECT Cartes.id_carte
                  FROM Cartes
                  INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
              )";

  echo "<h1> Cartes dans aucun deck </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">title</i>Titre</th>";
    echo "<th><i class=\"material-icons\">insert_photo</i>Image</th>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>Id carte</th>";
    echo "<th><i class=\"material-icons\">merge_type</i>Type</th>";
    echo "<th><i class=\"material-icons\">whatshot</i>Nature</th>";
    echo "<th><i class=\"material-icons\">apps</i>Famille</th>";
    echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

      while ($card = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$card["titre"]."</td>";
        echo "<td><img src=\"".$card["image"]."\" style=\"width:50%;height:121px;\"/></td>";
        echo "<td>".$card["id_carte"]."</td>";
        echo "<td>".$card["type_carte"]."</td>";
        echo "<td>".$card["nature"]."</td>";
        echo "<td>".$card["famille"]."</td>";
        echo "<td><a href=\"/Cards.php?id=". $card["id_carte"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/DeleteCard.php?id=".$card["id_carte"]."\"><i class=\"material-icons\">delete</i></a>
                  <a href=\"/AddCardToDeck.php?id=".$card["id_carte"]."\"><i class=\"material-icons\">add</i></a></td>";
        echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

include "Footer.php";
?>
