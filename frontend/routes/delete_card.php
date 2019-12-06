<?php

include "connect.php"

$error = false;

if (empty($_DELETE['id_carte']))
    $error = true;

if ($error) {
  echo "All fields are required.";
} else {
  echo "Proceed...";
}

if ($stmt = $connection->prepare("DELETE FROM Cartes WHERE id_carte = ?")) {

    $stmt->bindParam(1, $_DELETE['id_carte']);
    $stmt->execute();
    $stmt->close();
}
$connection->close();
?>