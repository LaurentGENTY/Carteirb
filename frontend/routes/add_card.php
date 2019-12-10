<?php

include "connect.php";

// Required field names
$required = array('title', 'nature', 'family', 'Type');

// Loop over field names, make sure each one exists and is not empty
$error = false;

echo $_POST['Type'];

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


if ($stmt = $connection->prepare("INSERT INTO Cartes (titre, type_carte, nature, famille) VALUES (?, ?, ?, ?);")) {
    //$type = "Monstre";
    $stmt->bind_param('ssss', $_POST['title'],$_POST['Type'],$_POST['nature'],$_POST['family']);
    // $stmt->bindParam(1, $_POST['title']);
    // $stmt->bind_param(2, "Monstre");
    // $stmt->bind_param(3, $_POST['nature']);
    // $stmt->bind_param(4, $_POST['family']);

    $stmt->execute();
    $stmt->close();
}
$connection->close();
//include "Modification.php";
exit();
?>
