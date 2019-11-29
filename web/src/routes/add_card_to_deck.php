<?php

include "connect.php"

$required = array('id_deck', 'id_carte');

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
//insert into linked tables ?

    $stmt->execute();
    $stmt->close();
}
$connection->close();
?>