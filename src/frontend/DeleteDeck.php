<?php

include "connect.php";

$error = false;

if(isset($_GET["id"])) {
  $id_deck = $_GET["id"];
  deleteDeck($connection,$id_deck);
} else {
  header('Location: /Decks.php');
  exit();
}

function deleteDeck($connection,$id_deck) {
  /* delete le joueur */
  $requete="DELETE FROM Decks WHERE Decks.id_deck = ?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id_deck);
      $stmt->execute();
      $stmt->close();

  }
  $connection->close();
  header('Location: /Decks.php');
  exit();
}
?>
