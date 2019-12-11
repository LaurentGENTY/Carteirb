<?php

include "connect.php";

$error = false;

if(isset($_GET["id"])) {
  $id_card = $_GET["id"];
  deleteCard($connection,$id_card);
} else {
  header('Location: /Cards.php');
  exit();
}

function deleteCard($connection,$id_card) {
  /* delete le card */
  if ($stmt = $connection->prepare("DELETE FROM Exemplaires
                  WHERE Exemplaires.id_carte=?;")) {
      $stmt->bind_param('i', $id_card);
      $stmt->execute();
      if ($stmt1 = $connection->prepare("DELETE FROM Cartes
      WHERE Cartes.id_carte = ?;")) {
            $stmt1->bind_param('i', $id_card);
            $stmt1->execute();
      }
      $stmt->close();

  }
  header('Location: /Cards.php');
  exit();
}
?>
