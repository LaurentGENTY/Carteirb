 <?php
  $login = 'lgenty';
  $db_pwd = 'sugute10';
  $db_name = 'lgenty';
  /* Creation de l'objet qui gere la connexion: */
  $connection = new mysqli("localhost", $login, $db_pwd, $db_name);
  if($connection->connect_error){
      die("Connection failed: " . $connection->connect_error);
  }
?>
