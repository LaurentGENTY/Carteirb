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

if ($stmt = $connection->prepare("INSERT INTO Decks (nom_deck,id_joueur) VALUES (?,?);")) {
    echo $_COOKIE['id'];
    $stmt->bind_param('si', $_POST['title'],$_COOKIE['id']);
    $stmt->execute();
    $stmt->close();
}
$connection->close();
include "Decks.php";
exit();
?>
