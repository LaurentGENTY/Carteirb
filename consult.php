<?php
 $login = 'educhemin001';
 $db_pwd = '93deli83';
 /* Creation de l'objet qui gere la connexion: */
 $connection = new mysqli("localhost", $login, $db_pwd, $login);
?>

<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<?php
      $requete = "select * from Tournoi;";
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
</html>
