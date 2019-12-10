<?php

/* si on est deja connecte on sen va */
if(!isset($_COOKIE["id_joueur"])) {
  header('Location: /index.php');
  exit();
}

setcookie("id_joueur", NULL, time() - 3600);
unset($_COOKIE['id_joueur']);

include "Header.php";
?>

<h1> Déconnection réussie ! </h1>

<?php
include "Footer.php";
?>
