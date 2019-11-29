<<<<<<< HEAD
 <html>
=======
<html>
>>>>>>> cf41f93359e595208fd77bd54591a672c3bc0515
 <head>
  <title>PHP Test</title>
 </head>
 <body>
<<<<<<< HEAD
   <h2>Exemple de requete php MySQL</h2>
     <?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* Execution d'une requete multiple */
    $connection->multi_query($creation);
        echo "Creation de la table des cartes\n";
=======
   <h2>Exemple de requ&ecirc;te php MySQL</h2>
     <?php
    include "connect.php"; /* Le fichier connect.php contient les identifiants de connexion */
    /* On crée une table avec des données: */
    $creation="
           create table ACTEUR (
           NOM varchar(20) not null,
           PRENOM varchar(10) not null,
           primary key (NOM)
           );
           
           insert into ACTEUR (NOM, PRENOM) values
           ('Roth', 'Tim'),
           ('Keitel', 'Harvey');
           ";  
    /* Execution d'une requete multiple */
    $connection->multi_query($creation);
        echo "Cr&eacute;ation de la table ACTEUR\n";
>>>>>>> cf41f93359e595208fd77bd54591a672c3bc0515
     ?>
     <table>
       <tr>
     <th>Nom</th>
<<<<<<< HEAD
     <th>Prenom</th>
       </tr>
<?php
      $requete = "select * from Exemplaires natural join ";
=======
     <th>Pr&eacute;nom</th>
       </tr>
<?php
      $requete = "select * from ACTEUR";
>>>>>>> cf41f93359e595208fd77bd54591a672c3bc0515
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
>>>>>>> cf41f93359e595208fd77bd54591a672c3bc0515
