<?php

include "connect.php";

// Required field names
$required = array('title');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
  header("Location: /Erreur.php");
  exit();
} else {
  echo "Proceed...";
}

/* si le joueur nest pas conencte alors il ne peut pas créer de deck */
if(!isset($_COOKIE["id_joueur"])) {
  header("Location: /Decks.php");
  exit("Pas de joueur connecté");
}

$nom = $_POST["title"];
$id_joueur = $_COOKIE["id_joueur"];

if ($stmt = $connection->prepare("INSERT INTO Decks (nom_deck,id_joueur) VALUES (?,?)")) {
    $stmt->bind_param('si', $nom,$id_joueur);
    $stmt->execute();
    $stmt->close();
}
$connection->close();
header("Location: /Decks.php");
exit();
?>
