<?php
include "connect.php";
include "Header.php";

echo "<h1> Meilleures caractéristiques des familles de cartes </h1>";

$requete = "SELECT DISTINCT t1.famille, t1.type_caracteristique, t1.valeur_caracteristique
            FROM Cartes_Caracteristiques_Valeurs t1
            INNER JOIN (
                  SELECT famille, type_caracteristique, MAX(CAST(valeur_caracteristique AS UNSIGNED)) AS MaxVal
                  FROM Cartes_Caracteristiques_Valeurs
                  GROUP BY famille
            ) MaxTable
            ON t1.famille = MaxTable.famille
            WHERE CAST(t1.valeur_caracteristique AS UNSIGNED) = MaxTable.MaxVal";


if ($res = $connection->query($requete)) {

  echo "<table>";
  echo "<thead>";

  echo "<tr>";
  echo "<th><i class=\"material-icons\">title</i>Famille</th>";
  echo "<th><i class=\"material-icons\">title</i>Caractéristique</th>";
  echo "<th><i class=\"material-icons\">equalizer</i>Valeur</th>";

  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

/* ... on récupère un tableau stockant le résultat */
  while ($card = $res->fetch_assoc()) {
    
    echo "<tr>";  
    echo "<td>".$card["famille"]."</td>";
    echo "<td>".$card["type_caracteristique"]."</td>";
    echo "<td>".$card["valeur_caracteristique"]."</td>";
    echo "<tr>";

  }
  
  $connection->close();
  echo "</tbody>";
  echo "</table>";

} else {
  echo "<tr>";  
  echo "<p><i class=\"material-icons\">warning</i>Error while consulting database<i class=\"material-icons\">warning</i></p>";  
  echo "<tr>";  

}

?>