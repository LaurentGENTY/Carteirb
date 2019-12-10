<?php
include "connect.php";
include "Header.php";

if(isset($_GET["id"])) {
  $id_deck = $_GET["id"];
  showCardsDeck($connection,$id_deck);
} else {
  showAll($connection);
}

function add_deck($connection) {
    echo "<form class='col s12' method='get'>";
    echo "<p> Titre";
    echo "<input type='text' class='validate' name='Titre'/></p>";
    echo "<button class='btn waves-effect waves-light' type='submit'>Ajouter un deck</button>";
    echo "</form>";
    if(isset($_GET["Titre"])){
        $requete="INSERT INTO Decks (nom_deck,id_joueur) VALUES (?,?);";
        if($stmt = $connection->prepare($requete)){
            $stmt->bind_param('si',$_GET["Titre"],$_COOKIE["id_joueur"]);
            $stmt->execute();
            $stmt->close();
        }
    }
}

/* Afficher tous les decks de la BD */
function showAll($connection) {
    echo "<h1>Ajout d'un deck</h1>";
    add_deck($connection);
    echo "<h1>Modification d'un deck</h1>";
  $requete="SELECT Decks.nom_deck, Decks.id_joueur, Decks.id_deck
            FROM Decks;";

  /* execute la requete */
  if($res = $connection->query($requete)) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th><i class=\"material-icons\">title</i>Nom du deck</th>";
      echo "<th><i class=\"material-icons\">person_add</i>Créateur</th>";
      echo "<th><i class=\"material-icons\">insert_link</i>Liens</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while ($deck = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$deck["nom_deck"]."</td>";
            echo "<td>".$deck["id_joueur"]."</td>";
            if($deck["id_joueur"] == $_COOKIE["id_joueur"])
            echo "<td><a href=\"/Decks.php?id=". $deck["id_deck"] ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                      <a href=\"/DeleteDeck.php?id=".$deck["id_deck"]."\"><i class=\"material-icons\">delete</i></a>
                      <a href=\"/AddCardToDeck.php?id_deck=".$deck["id_deck"]."\"><i class=\"material-icons\">add</i></a></td>";
            echo "</tr>";
      }
      $connection->close();
      echo "</tbody>";
      echo "</table>";
  }
}

/* Afficher toutes les parties d'un tournois donné en GET */
function showCardsDeck($connection,$id) {
  $requete="SELECT Cartes.titre, Cartes.id_carte, Cartes.type_carte, Cartes.nature, Cartes.famille
            FROM Cartes
            INNER JOIN Deck_contient_carte ON Deck_contient_carte.id_carte = Cartes.id_carte
            INNER JOIN Decks ON Decks.id_deck = Deck_contient_carte.id_deck
            WHERE Decks.id_deck = ?";

  echo "<h1> Cartes du deck ".$id."</h1>";

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
        echo "<td><a href=\"/Cards.php?id=". $id_carte ."\"><i class=\"material-icons\">call_missed_outgoing</i></a>
                  <a href=\"/DeleteCard.php?id=".$id_carte."\"><i class=\"material-icons\">delete</i></a>
                  <a href=\"/AddCardToDeck.php?id=".$id_carte."\"><i class=\"material-icons\">add</i></a></td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      $stmt->close();
  }
}

?>
