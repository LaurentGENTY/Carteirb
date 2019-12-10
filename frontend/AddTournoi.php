<?php

include "connect.php";

// Required field names

$required = array('Lieu','Date', 'Type');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
  header("Location: /Cards.php");
  exit("All fields are required.");
} else {
  echo "Proceed...";
}


if ($stmt = $connection->prepare("INSERT INTO Tournois (lieu, date_tournoi, type_tournoi) VALUES (?, ?, ?);")) {
        //$type = "Monstre";
    $stmt->bind_param('sds', $_POST['Lieu'],$_POST['Date'],$_POST['Type']);
      // $stmt->bindParam(1, $_POST['title']);
      // $stmt->bind_param(2, "Monstre");
      // $stmt->bind_param(3, $_POST['nature']);
      // $stmt->bind_param(4, $_POST['family']);

    $stmt->execute();
    $stmt->close();
}
header("Location: /Tournois.php");
exit();
?>
