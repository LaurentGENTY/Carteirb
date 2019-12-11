<?php

include "connect.php";

// Required field names

$required = array('title','family', 'Type');

// Loop over field names, make sure each one exists and is not empty
$error = false;


if($_POST['Type'] != 'Monstre' && $_POST['Type'] != 'Fusion' && $_POST['Type'] != 'Fusion' && $_POST['Type'] != 'Magie' && $_POST['Type'] !='Piège'){
  echo "All fields are required.";
  header("Location: /Cards.php");
  exit("Type non conforme");
}

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
$nat=true;
if(empty($_POST['nature'])){
  $nat=false;
  if($_POST['Type'] == 'Monstre' || $_POST['Type'] == 'Fusion' || $_POST['Type'] == 'Fusion'){
    echo "error";
    header("Location: /Cards.php");
    exit("Nature non spécifiée alors qu'elle devrait l'être");
  }
}

if($nat){
  if(empty($_POST['URL'])){
    if ($stmt = $connection->prepare("INSERT INTO Cartes (titre, type_carte, nature, famille) VALUES (?, ?, ?, ?);")) {
        $stmt->bind_param('ssss', $_POST['title'],$_POST['Type'],$_POST['nature'],$_POST['family']);

        $stmt->execute();
        $stmt->close();
      }
      $connection->close();
      header("Location: /Cards.php");
      exit();
    }
    if ($stmt = $connection->prepare("INSERT INTO Cartes (titre, type_carte, nature, famille, image) VALUES (?, ?, ?, ?, ?);")) {
      $stmt->bind_param('sssss', $_POST['title'],$_POST['Type'],$_POST['nature'],$_POST['family'],$_POST['URL']);
      $stmt->execute();
      $stmt->close();
    }
    $connection->close();
    header("Location: /Cards.php");
    exit();
  }
else{
  if(empty($_POST['URL'])){
    if($field != 'Monstre')
    if ($stmt = $connection->prepare("INSERT INTO Cartes (titre, type_carte, famille) VALUES (?, ?, ?);")) {
        $stmt->bind_param('sss', $_POST['title'],$_POST['Type'],$_POST['family']);
        $stmt->execute();
        $stmt->close();
      }
      $connection->close();
      header("Location: /Cards.php");
      exit();
    }

    if ($stmt = $connection->prepare("INSERT INTO Cartes (titre, type_carte, famille, image) VALUES (?, ?, ?, ?);")) {
      $stmt->bind_param('ssss', $_POST['title'],$_POST['Type'],$_POST['family'],$_POST['URL']);
      $stmt->execute();
      $stmt->close();
      $connection->close();
    }
    header("Location: /Cards.php");
    exit();
}
    header("Location: /Cards.php");
    exit();
?>
