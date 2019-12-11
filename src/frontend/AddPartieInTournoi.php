<?php

include "connect.php";

// Required field names

$required = array('adv1','adv2', 'resultat','deck1','deck2');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if($_POST['resultat'] != 'VICTOIRE' && $_POST['resultat'] != 'DEFAITE'){
  $error = true;
}
if($_POST['resultat'] == 'VICTOIRE'){
  $res1 = 'VICTOIRE';
  $res2 = 'DEFAITE';
}
else{
  $res2 = 'VICTOIRE';
  $res1 = 'DEFAITE';
}

if ($error) {
  echo "All fields are required.";
  header("Location: /Decks.php");
  exit("All fields are required.");
} else {
  echo "Proceed...";
}

if ($stmt = $connection->prepare("SELECT * FROM Decks;")) {
    $stmt->bind_result($id_deck,$nom,$id_joueur);
    $stmt->execute();
}

$joueur_1 = false;
$joueur_2 = false;

while($stmt->fetch()) {
    if($id_deck == $_POST['deck1'] && $id_joueur == $_POST['adv1']){
        $joueur_1 = true;
    }
    if($id_deck == $_POST['deck2'] && $id_joueur == $_POST['adv2']){
        echo "salut";
        $joueur_2 = true;
    }
}

if(!$joueur_1 || !$joueur_2){
  header("Location: /Erreur.php");
  exit("");
}

$id_tournoi = $_GET["id"];

if ($stmt = $connection->prepare("INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (?, ?, ?);")) {
    $stmt->bind_param('isi', $_POST['adv1'],$res1,$id_tournoi);
    $stmt->execute();
    $stmt->close();
}

if ($stmt = $connection->prepare("INSERT INTO Parties (adversaire, resultat, id_tournoi) VALUES (?, ?, ?);")) {
    $stmt->bind_param('isi', $_POST['adv2'],$res2,$id_tournoi);
    $stmt->execute();
    $stmt->close();
}

if ($stmt = $connection->prepare("SELECT * FROM Parties;")) {
    $stmt->bind_result($id_partie,$adv,$res,$id_tournois);
    $stmt->execute();
}

$id_partie1=0;
$id_partie2=0;
while($stmt->fetch()) {
    if($adv == $_POST['adv2'] && $res2 == $res && $id_tournois==$id_tournoi && $id_partie2<$id_partie){
        $id_partie2 = $id_partie;
    }
    if($adv == $_POST['adv1'] && $res1 == $res && $id_tournois==$id_tournoi && $id_partie1<$id_partie){
        $id_partie1 = $id_partie;
    }
}
$stmt->close();
echo $id_partie1;
echo $id_partie2;
if ($stmt = $connection->prepare("INSERT INTO Partie_utilise_deck (id_deck, id_partie) VALUES (?, ?);")) {
    $stmt->bind_param('ii', $_POST['deck1'],$id_partie1);
    $stmt->execute();
    $stmt->close();
}

if ($stmt = $connection->prepare("INSERT INTO Partie_utilise_deck (id_deck, id_partie) VALUES (?, ?);")) {
    $stmt->bind_param('ii', $_POST['deck2'],$id_partie2);
    $stmt->execute();
    $stmt->close();
}

$connection->close();
header("Location: /AddPartiesToTournoi.php?id=".$id_tournoi);
exit();
?>
