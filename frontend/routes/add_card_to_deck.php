<?php

include "../connect.php";

/* verifie qu'on a rempli les champs necessaires */
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

if ($stmt = $connection->prepare("INSERT INTO Deck_contient_carte VALUES (?, ?)")) {

    $stmt->bindParam(1, $_POST['id_deck']);
    $stmt->bindParam(2, $_POST['id_carte']);

    $stmt->execute();
    $stmt->close();
}
$connection->close();

?>