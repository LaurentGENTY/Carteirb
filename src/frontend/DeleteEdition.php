<?php

include "connect.php";

$error = false;

if(isset($_GET["id"])) {
  $id_edition = $_GET["id"];

  deleteEdition($connection,$id_edition);
} else {
  header('Location: /Editions.php');
  exit();
}

function deleteEdition($connection,$id_edition) {

  /* delete la carac */
  if ($stmt = $connection->prepare("DELETE FROM Exemplaires
                  WHERE Exemplaires.id_edition=?")) {
      $stmt->bind_param('i', $id_edition);
      $stmt->execute();

      if ($stmt1 = $connection->prepare("DELETE FROM Carte_est_edition
      WHERE Carte_est_edition.id_edition = ?;")) {
            $stmt1->bind_param('i', $id_edition);
            $stmt1->execute();
            if ($stmt2 = $connection->prepare("DELETE FROM Editions
            WHERE Editions.id_edition = ?;")) {
                  $stmt2->bind_param('i', $id_edition);
                  $stmt2->execute();
                  $stmt2->close();
            }
            $stmt1->close();
      }
      $stmt->close();
  }
  header('Location: /Editions.php');
  exit();
}
?>
