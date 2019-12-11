<?php

include "connect.php";

$error = false;

if(isset($_GET["id"])) {
  $id_tournoi = $_GET["id"];
  deleteTournoi($connection,$id_tournoi);
} else {
  header('Location: /Tournois.php');
  exit();
}


function deleteTournoi($connection,$id_tournoi) {
  /* delete le card */
  if ($stmt = $connection->prepare("DELETE FROM Parties
                  WHERE Parties.id_tournoi=?;")) {
      $stmt->bind_param('i', $id_tournoi);
      $stmt->execute();
      $stmt->close();
      if ($stmt1 = $connection->prepare("DELETE FROM Tournois
      WHERE Tournois.id_tournoi = ?;")) {
            $stmt1->bind_param('i', $id_tournoi);
            $stmt1->execute();
            $stmt1->close();
      }
  }
  header('Location: /Tournois.php');
  exit();
}
?>
