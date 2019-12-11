<?php

include "connect.php";

$error = false;

if(isset($_GET["id"])) {
  $id_joueur = $_GET["id"];
  deleteJoueur($connection,$id_joueur);
} else {
  header('Location: /Joueurs.php');
  exit();
}

function deleteJoueur($connection,$id_joueur) {
  /* delete le joueur */
  $requete="DELETE FROM Joueurs
            WHERE Joueurs.id_joueur = ?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('i', $id_joueur);
      $stmt->execute();
      while($stmt->fetch()) {}
      $stmt->close();

  }
  header('Location: /Joueurs.php');
  exit();
}
?>
