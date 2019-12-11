<?php

include "connect.php";

// Required field names

$required = array('Edition','Impression', 'Date');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
  header("Location: /Erreur.php");
  exit("All fields are required.");
} else {
  echo "Proceed...";
}


$requete="INSERT INTO Editions (nom_edition,nombre_de_tirage,date_impression) VALUES (?,?,?);";
if($stmt = $connection->prepare($requete)){
    echo $time;
    $stmt->bind_param('sis',$_POST["Edition"],$_POST["Impression"],$_POST["Date"]);
    $stmt->execute();
    $stmt->close();
}
header("Location: /Editions.php");
exit();
?>
