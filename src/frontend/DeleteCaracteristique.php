<?php

include "connect.php";

$error = false;

if(isset($_GET["id_carac"])) {
  $id_carac = $_GET["id_carac"];

  if(isset($_GET["id"])) {
    deleteCarac($connection,$id_carac,$_GET["id"]);
  } else {
    deleteCarac($connection,$id_carac,"");
  }
} else {
  header('Location: /index.php');
  exit();
}

function deleteCarac($connection,$id_carac,$id_card) {

  /* delete la carac */
  if ($stmt = $connection->prepare("DELETE FROM Carte_a_caracteristique
                  WHERE Carte_a_caracteristique.id_caracteristique=?")) {
      $stmt->bind_param('i', $id_carac);
      $stmt->execute();
      if ($stmt1 = $connection->prepare("DELETE FROM Caracteristiques
      WHERE Caracteristiques.id_caracteristique = ?;")) {
            $stmt1->bind_param('i', $id_carac);
            $stmt1->execute();
      }
      $stmt->close();
  }
  if($id_card == "") {
    header('Location: /Cards.php');
  } else {
    header('Location: /Cards.php?id='.$id_card);
    exit();
  }
}
?>
