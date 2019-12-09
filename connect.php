
 <?php
  $login = 'educhemin001';
  $db_pwd = '93deli83';
  $db_name = 'educhemin001';
  /* Creation de l'objet qui gere la connexion: */
  $connection = new mysqli("localhost", $login, $db_pwd, $db_name);
  if($connection->connect_error){
      die("Connection failed: " . $connection->connect_error);
  }
?>
