<?php
include "connect.php";
include "Header.php";

// Required field names
$required = array('nom','prenom');

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

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$pseudo = "";
if(isset($_POST["pseudo"])) {
  $pseudo = $_POST["pseudo"];
}

if ($stmt = $connection->prepare("INSERT INTO Joueurs (nom,prenom,pseudo) VALUES (?,?,?)")) {
    $stmt->bind_param('sss', $nom,$prenom,$pseudo);
    $stmt->execute();
    $stmt->close();
}
$connection->close();
header("Location: /Joueurs.php");
exit();
?>
