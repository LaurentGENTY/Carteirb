 <html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
   <h2>Exemple de requete php MySQL</h2>
     <?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* Execution d'une requete multiple */
    $connection->multi_query($creation);
        echo "Creation de la table des cartes\n";
     ?>
     <table>
       <tr>
     <th>Nom</th>
     <th>Prenom</th>
       </tr>
<?php
      $requete = "select * from Exemplaires natural join ";
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
