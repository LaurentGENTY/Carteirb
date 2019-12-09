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
                <input type="submit" name="submit" value="Valider" />
              </form>
                <?php
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
