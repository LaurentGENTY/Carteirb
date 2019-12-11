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
  header("Location: /Decks.php");
  exit("All fields are required.");
} else {
  echo "Proceed...";
}
$id_card=$_GET["id"];


if($stmt = $connection->prepare("INSERT INTO Caracteristiques (type_caracteristique, valeur_caracteristique) VALUES (?,?);")){
    $stmt->bind_param('ss',$_POST["type"],$_POST["valeur"]);
    $stmt->execute();
    $requete2 = "SELECT DISTINCT id_caracteristique 
                FROM Caracteristiques 
                WHERE type_caracteristique = ? AND valeur_caracteristique = ?;";
        
    if ($stmt1 = $connection->prepare($requete2)) {
        echo "coucou1";
        $stmt1->bind_param('ss',$_POST["type"],$_POST["valeur"]);
        $stmt1->bind_result($id_carac);
        $stmt1->execute();
        echo"hey";
        echo $id_carac;
        echo "prout";

        if ($stmt2 = $connection->prepare("INSERT INTO Carte_a_caracteristique (id_caracteristique, id_carte) VALUES (?,?);")) {
            echo "coucou2";
            $stmt2->bind_param('ii', $id_carac, $id_card);
            $stmt2->execute();
            $stmt2->close();
          }
          $stmt1->close();
        }
        $stmt->close();
    }

echo $id_card;
//header("Location: /Cards.php/id=".$id_card);
exit();
?>
