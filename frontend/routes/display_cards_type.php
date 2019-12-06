<?php

include "../connect.php";

// Required field names
$required = array('type');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

$requete = "SELECT *
            FROM Cartes
            WHERE type_carte = ?";

 if($res = $connection->query($requete))

    $stmt->bindParam(1, $_POST['type']);

    while ($carte =  $res->fetch_assoc()) {
        echo "\t".'<tr><td>'.$carte['titre'].'</td>';
        echo '<td>'.$carte['id_carte'].'</td>';
        echo '<td>'.$carte['type'].'</td>';
        echo '<td>'.$carte['nature'].'</td>';
        echo '<td>'.$carte['famille'].'</td>';
        echo '</tr>'."\n";
    }
     /*liberation de l'objet requete:*/
     $res->free();
     /*fermeture de la connexion avec la base*/
     $connection->close();
 ?>