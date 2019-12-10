<?php
include "connect.php";
include "Header.php";

if(isset($_GET["id"])) {
  $id_joueur = $_GET["id"];
  showJoueur($connection,$id_joueur);
} else {
  showJoueurs($connection);
}

/* Afficher tous les decks de la BD */
function showJoueurs($connection) {

  $requete="SELECT Joueurs.id_joueur, Joueurs.nom, Joueurs.prenom, Joueurs.pseudo
            FROM Joueurs;";

  echo "<h1> Liste des joueurs </h1>";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">person</i>Nom joueur</th>";
      echo "<th><i class=\"material-icons\">person_outline</i>Prenom</th>";
      echo "<th><i class=\"material-icons\">title</i>Pseudo</th>";
      echo "<th><i class=\"material-icons\">title</i>Parties</th>";
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

/* Afficher les cartes d'un joueur */
function showJoueur($connection,$id) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille
            FROM Cartes
            INNER JOIN Exemplaires ON Cartes.id_carte = Exemplaires.id_carte
            WHERE Exemplaires.id_joueur = ?";

  echo "<h1> Cartes du joueurs ".$id."</h1>";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id);
      $stmt->bind_result($titre, $id_carte, $type, $nature, $famille);
      $stmt->execute();

      echo "<table>";
      echo "<thead>";

      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Titre</th>";
      echo "<th><i class=\"material-icons\">format_list_numbered</i>Id carte</th>";
      echo "<th><i class=\"material-icons\">merge_type</i>Type</th>";
      echo "<th><i class=\"material-icons\">whatshot</i>Nature</th>";
      echo "<th><i class=\"material-icons\">apps</i>Famille</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while($stmt->fetch()) {
        echo "<tr>";
        echo "<td>".$titre."</td>";
        echo "<td>".$id_carte."</td>";
        echo "<td>".$type."</td>";
        echo "<td>".$nature."</td>";
        echo "<td>".$famille."</td>";
        echo "<td><a href=\"/Cards.php?id=". $id_carte ."\">Voir Carte</a></td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      $stmt->close();
  }
}

?>