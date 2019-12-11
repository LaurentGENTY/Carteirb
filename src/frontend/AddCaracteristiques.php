<?php

include "connect.php";

// Required field names

$required = array('valeur','type');

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

$id_card = $_GET["id"];
$type = $_POST["type"];
$valeur = $_POST["valeur"];

if($stmt = $connection->prepare("INSERT INTO Caracteristiques (type_caracteristique, valeur_caracteristique) VALUES (?,?)")){
    $stmt->bind_param('ss',$type,$valeur);
    $stmt->execute();
    $stmt->close();
}

$requete2 = "SELECT MAX(id_caracteristique) as max
            FROM Caracteristiques
            WHERE type_caracteristique = ? AND valeur_caracteristique = ?";

if ($stmt1 = $connection->prepare($requete2)) {
    $stmt1->bind_param('ss',$type,$valeur);
    $stmt1->bind_result($max);
    $stmt1->execute();
    $stmt1->fetch();
    $stmt1->close();
}

echo $max;

$requeteAjout = "INSERT INTO Carte_a_caracteristique VALUES (?,?)";

if ($stmt2 = $connection->prepare($requeteAjout)) {
    $stmt2->bind_param('ii', $max, $id_card);
    $stmt2->execute();
    $stmt2->close();
    header("Location: /Cards.php?id=".$id_card);
    exit();
}

?>
