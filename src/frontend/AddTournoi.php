<?php

include "connect.php";

// Required field names

$required = array('lieu','date', 'type');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
  header("Location: /Tournois.php");
  exit("All fields are required.");
} else {
  echo "Proceed...";
}


if ($stmt = $connection->prepare("INSERT INTO Tournois (lieu, date_tournoi, type_tournoi) VALUES (?, ?, ?);")) {
    $stmt->bind_param('sds', $_POST['lieu'],$_POST['date'],$_POST['type']);
    $stmt->execute();
    $stmt->close();
}
header("Location: /Tournois.php");
exit();
?>
