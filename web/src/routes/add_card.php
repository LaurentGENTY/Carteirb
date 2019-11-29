<?php

include "../connect.php";

// Required field names
$required = array('title', 'type', 'nature', 'family');

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

if ($stmt = $connection->prepare("INSERT INTO Cartes (titre, type_carte, nature, famille) VALUES (?, ?, ?, ?)")) {
    
    $stmt->bindParam(1, $_POST['title']);
    $stmt->bindParam(2, $_POST['type']);
    $stmt->bindParam(3, $_POST['nature']);
    $stmt->bindParam(4, $_POST['family']);

    $stmt->execute();
    $stmt->close();
}
$connection->close();
?>