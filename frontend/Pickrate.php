<?php
include "connect.php";
include "Header.php";

echo "<h1> Taux de pick des cartes </h1>";

$requete = "SELECT Utilisations.titre AS Carte, CONCAT(ROUND(Nb_utilisations * 100 / Nb_decks, 2), '%') AS PickRate
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
    echo "<th><i class=\"material-icons\">show_chart</i>Pick Rate</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($card = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$card["Carte"]."</td>";
        echo "<td>".$card["PickRate"]."</td>";
        echo "</tr>";
    }

    $connection->close();
    echo "</tbody>";
    echo "</table>";
}
?>
