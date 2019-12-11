<?php
include "connect.php";

if(isset($_GET["id"])) {
  $id_exemplaire = $_GET["id"];
  $id_joueur = $_GET["id_joueur"];
  deleteExemplaire($connection,$id_exemplaire,$id_joueur);
} else {
  header('Location: /Cards.php');
  exit();
}

function deleteExemplaire($connection,$id_exemplaire,$id_joueur) {
  /* delete le card */
  if ($stmt = $connection->prepare("DELETE FROM Exemplaires
                  WHERE Exemplaires.id_exemplaire = ?")) {
      $stmt->bind_param('i', $id_exemplaire);
      $stmt->execute();
      $stmt->close();
  }
  header('Location: /Exemplaires.php?id='.$id_joueur);
  exit();
}
?>
