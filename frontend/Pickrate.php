<?php
include "connect.php";
include "Header.php";

echo "<h1> Taux de pick des cartes </h1>";

$requete = "SELECT Utilisations.titre AS Carte, CONCAT(ROUND(Nb_utilisations * 100 / Nb_decks, 2), '%') AS PickRate, Utilisations.id_carte, Utilisations.image
            FROM (
                (
                SELECT Cartes.id_carte, id_deck, titre, COUNT(*) AS Nb_utilisations
                FROM Cartes
                INNER JOIN Deck_contient_carte ON Cartes.id_carte = Deck_contient_carte.id_carte
                GROUP BY Cartes.id_carte
            ) Utilisations
            INNER JOIN (
                SELECT id_deck, COUNT(*) AS Nb_decks
                FROM Decks
            ) TotalDecks
            ON Utilisations.id_deck = TotalDecks.id_deck)
            ORDER BY Nb_utilisations * 100 / Nb_decks desc";

if ($res = $connection->query($requete)) {

    echo "<table>";
    echo "<thead>";

    echo "<tr>";
    echo "<th><i class=\"material-icons\">title</i>Nom carte</th>";
    echo "<th><i class=\"material-icons\">insert_photo</i>Image</th>";
    echo "<th><i class=\"material-icons\">show_chart</i>Pick Rate</th>";
    echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($card = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$card["Carte"]."</td>";
        echo "<td><img src=\"".$card["image"]."\" style=\"width:50%;height:121px;\"/></td>";
        echo "<td>".$card["PickRate"]."</td>";
        echo "<td><a href=\"/Cards.php?id=". $card["id_carte"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/DeleteCard.php?id=".$card["id_carte"]."\"><i class=\"material-icons\">delete</i></a>
                  <a href=\"/AddCardToDeck.php?id=".$card["id_carte"]."\"><i class=\"material-icons\">add</i></a></td>";
        echo "</tr>";
    }

    $connection->close();
    echo "</tbody>";
    echo "</table>";
}

include "Footer.php";
?>
