<<<<<<< HEAD
=======
<?php
 $login = 'educhemin001';
 $db_pwd = '93deli83';
 /* Creation de l'objet qui gere la connexion: */
 $connection = new mysqli("localhost", $login, $db_pwd, $login);
?>

>>>>>>> 058379c1039b5440f45e793408e3bcb614acb3db
<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<<<<<<< HEAD
   <h2>Exemple de requ&ecirc;te php MySQL</h2>
     <?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    
    $create_db 
    $connection->multi_query($creation);
        echo "Cr&eacute;ation de la table ACTEUR\n";
     ?>
     <table>
       <tr>
     <th>Nom</th>
     <th>Pr&eacute;nom</th>
       </tr>
<?php
      $requete = "select * from ACTEUR";
=======
<?php
      $requete = "select * from Tournoi;";
>>>>>>> 058379c1039b5440f45e793408e3bcb614acb3db
      /* Si l'execution est reussie... */
      if($res = $connection->query($requete))
          /* ... on récupère un tableau stockant le résultat */
            while ($acteur =  $res->fetch_assoc()) {
              echo "\t".'<tr><td>'.$acteur['NOM'].'</td>';
              echo '<td>'.$acteur['PRENOM'].'</td>';
              echo '</tr>'."\n";
            }
            /*liberation de l'objet requete:*/
         $res->free();
         /*fermeture de la connexion avec la base*/
         $connection->close();
?>
   </table>
 </body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 058379c1039b5440f45e793408e3bcb614acb3db
