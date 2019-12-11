<?php
  $login = 'lgenty'/*A compléter*/;
  $db_pwd = 'sugute10'/*A compléter*/;
  /* Creation de l'objet qui gere la connexion: */
  $connection = new mysqli("localhost", $login, $db_pwd, $login);

  if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
  }
?>
