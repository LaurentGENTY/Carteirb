<?php

include "connect.php";

// Required field names

$required = array('Carte','Edition','Quality','ImpressionEffect','DateAcq','ModeAcq','DateLos');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if(!isset($_COOKIE["id_joueur"])) {
  header("Location: /login.php");
  exit("Pas de joueur connecté");
}

if ($error) {
  echo "All fields are required.";
  header("Location: /Exemplaires.php?id=".$_COOKIE['id_joueur']);
  exit("All fields are required.");
} else {
  echo "Proceed...";
}

if($stt = $connection->prepare("SELECT id_edition FROM Editions WHERE Editions.nom_edition = ?")){
    $stt->bind_param('s',$_POST['Edition']);
    $stt->bind_result($edition);
    $stt->execute();
    $stt->fetch();
    $stt->close();
    if($sttt = $connection->prepare("SELECT id_carte FROM Cartes WHERE Cartes.titre = ?")){
        $sttt->bind_param('s',$_POST['Carte']);
        $sttt->bind_result($carte);
        $sttt->execute();
        $sttt->fetch();
        $sttt->close();
        if ($stmt = $connection->prepare("INSERT INTO Exemplaires (date_acquisition, mode_acquisition, date_perte,qualite,effet_impression,id_edition,id_carte,id_joueur) VALUES (?, ?, ?, ?, ?, ?, ?, ?);")) {
            $stmt->bind_param('dsdisiii', $_POST['DateAcq'],$_POST['ModeAcq'],$_POST['DateLos'], $_POST['Quality'],$_POST['ImpressionEffect'],$edition,$carte,$_COOKIE['id_joueur']);
            $stmt->execute();
            $stmt->close();
        }
    }
}
header("Location: /Exemplaires.php?id=".$_COOKIE['id_joueur']);
exit();
?>
