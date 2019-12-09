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
} else {
  echo "Proceed...";
}

if ($stmt = $connection->prepare("INSERT INTO Decks (`nom_deck`, `id_joueur`) VALUES (?, ?);")) {
    //$type = "Monstre";
    echo "Dylan";
    $auteur = 6;
    $stmt->bind_param('sd', $_POST['title'],$auteur);
    // $stmt->bindParam(1, $_POST['title']);
    // $stmt->bind_param(2, "Monstre");
    // $stmt->bind_param(3, $_POST['nature']);
    // $stmt->bind_param(4, $_POST['family']);

    $stmt->execute();
    $stmt->close();
}
$connection->close();
include "Deck.php";
exit();
?>
