<?php
include "Header.php";
include "connect.php";

$requete="SELECT Tournois.id_tournoi, Tournois.lieu, Tournois.date_tournoi, Tournois.type_tournoi FROM Tournois;";

/* execute la requete */
if($res = $connection->query($requete)) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><i class=\"material-icons\">format_list_numbered</i>ID</th>";
    echo "<th><i class=\"material-icons\">place</i>Lieu</th>";
    echo "<th><i class=\"material-icons\">date_range</i>Date</th>";
    echo "<th><i class=\"material-icons\">merge_type</i>Type</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($tournoi = $res->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$tournoi["id_tournoi"]."</td>";
          echo "<td>".$tournoi["lieu"]."</td>";
          echo "<td>".$tournoi["date_tournoi"]."</td>";
          echo "<td>".$tournoi["type_tournoi"]."</td>";
          echo "</tr>";
    }
    $connection->close();
    echo "</tbody>";
    echo "</table>";
}

?>
