<?php
include "Header.php";
?>

<div class="nav">
    <a href="index.php">Accueil</a>
    <a class="active" href="Modification.php">Modification</a>
    <a href="Deck.php">Deck </a>
    <a href="Tournoi.php">Tournoi </a>
    <a href="Contact.php">A propos de nous</a>
</div>

<div class="content">
    <h1> Modification sur la base de donnée </h1>
    <div class="add">
        <h2> Ajout d'une carte </h2>
        <p>
            Type de carte (à choisir avant la suite) :
            <form action="#" method="post">
                <select name="type">
                    <option selected="default"> </option>
                    <option value="Monstre"> Monstre </option>
                    <option value="Magie"> Magie </option>
                    <option value="Piège"> Piège </option>
                    <option value="Terrain"> Terrain </option>
                </select> <br/>
                <input type="submit" name="submit" value="Valider" />
            </form>

            <?php
            if(!empty($_POST["type"]))
            if($_POST["type"] == "Monstre"){
                echo "Attaque :";
                echo "<input type='number' name='Attaque'/>";
                echo "</br>";
                echo "Défense :";
                echo "<input type='number' name='Defense' />";
                echo "</br>";
            }
            ?> </p>
            <p> Titre :
              <form action="add_card.php" method="post">
                <input type="text" name='title'/> <br/>
                Description :
                <input type="text" name="Description"/> <br/>
                Edition :
                <input type="text" name="Edition"/> <br/>
                Date :
                <input type="date" name="Date"/> <br/>
                Nature :
                <input type="text" name="nature"/> <br/>
                Famille :
                <input type="text" name="family"/> <br/>
                Type :
                <input type="text" name="Type" hidden placeholder=<?php echo $_POST["type"]?> value=<?php if(!empty($_POST["type"])){echo $_POST["type"];}else{echo "undefined";}?> />  <?php
                echo $_POST["type"];?>  <br/>
                <input type="submit" name="submit" value="Valider" />
              </form>
            </div>
            <div class="Consult">
              <h2> Consulation des cartes </h2>
      <?php
                include "connect.php";
                echo "<table> <tr> <td>";
                echo "<input type='text' name='card_name'/> </td>";
                echo "<td> <select name='card_family'>";
                $requete="select distinct type_carte from Cartes;";
                if($res = $connection->query($requete))
                    /* ... on récupère un tableau stockant le résultat */
                      while ($card_type =  $res->fetch_assoc()) {
                          echo "<option value=" . $card_type['type_carte'] .">" .$card_type['type_carte'] ."</option>";
                      }
                echo "</select> </td> ";
                echo "<td> <select name='card_family'>";
                $requete="select distinct famille from Cartes;";
                if($res = $connection->query($requete))
                    while ($card_family =  $res->fetch_assoc()) {
                        echo "<option value=". $card_family['famille'].">".$card_family['famille']. "</option>";
                    }
                echo "</select></td>";
                echo "<td> <select name='card_nature'>";
                $requete="select distinct nature from Cartes;";
                if($res = $connection->query($requete))
                    while ($card_nature =  $res->fetch_assoc()) {
                        echo "<option value=". $card_nature['nature'].">".$card_nature['nature']. "</option>";
                    }
                echo "</select></td>";
                echo "<td> <input type='submit' name='submit' value='Rechercher'/></td></tr>";
                $requete="select * from Cartes;";
                if($res = $connection->query($requete))
                    while ($card =  $res->fetch_assoc()) {
                        echo "<tr> <td>";
                        if(!empty($card["titre"]))
                        echo $card['titre']."(".$card['id_carte'].")";
                        echo "</td><td>";
                        if(!empty($card["type_carte"]))
                        echo $card['type_carte'];
                        echo "</td><td>";
                        if(!empty($card["famille"]))
                        echo $card['famille'];
                        echo "</td><td>";
                        if(!empty($card["nature"]))
                        echo $card['nature'];
                        echo "</td>";
                        echo "<td><a href='Carte.php'><input type='submit' name='submit' value='Voir'/></a>";
                        echo "<a href='index.php'><i class='material-icons'>delete</i></a>";
                        echo "</td> </tr>";
                    }
                $connection->close();
                // if($_POST('submit'))
                // include 'add_card.php'
                /*$requete="INSERT INTO `Cartes`(`titre`, `type_carte`, `nature`, `famille`) VALUES (?,?,?,?)",
                /* Si l'execution est reussie... */
                /*if($res=$connection->query($requete),)
                   $res->free();
                   /*fermeture de la connexion avec la base*/
                  // $connection->close();
                ?>
    </div>
    </p>
</div>
