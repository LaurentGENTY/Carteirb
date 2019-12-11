<?php

include "connect.php";

$required = array('pseudo');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if(isset($_GET["id"])) {
  $id_joueur = $_GET["id"];
  updatepseudo($connection,$id_joueur);
} else {
  header('Location: /Joueurs.php');
  exit();
}

function updatepseudo($connection,$id_joueur) {
  /* delete le joueur */
  $requete="UPDATE Joueurs SET pseudo=? WHERE Joueurs.id_joueur=?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('si', $_POST["pseudo"],$id_joueur);
      $stmt->execute();
      while($stmt->fetch()) {}
      $stmt->close();

  }
  header('Location: /Joueurs.php');
  exit();
}
?>
