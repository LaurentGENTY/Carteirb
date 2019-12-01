<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Carteirb </title>
        <link rel="stylesheet" type="text/css" href="Style.css">
    </head>
    <body>
        <div class="header">
            <h1> Carteirb <h1>
            <h2> Le site de jeux de cartes <h2>
        </div>
        <nav>
            <ul>
                <li><a href="Site.php"> Accueil</a></li>
                <li><a href="Ajout.php"> Ajout d'une carte </a></li>
                <li><a href="Tournoi.php"> Tournoi </a> </li>
                <li><a href="Apropos.php"> A propos </a> </li>
            </ul>
        </nav>
        <div class="content">
            <h1> Modification sur la base de donnée </h1>
            <h2> Ajout d'une carte </h2>
            <p> Titre :
                <input type="text" name="Titre"/> <br/>
                Description :
                <input type="text" name="Description"/> <br/>
                Edition :
                <input type="text" name="Edition"/> <br/>
                Date :
                <input type="date" name="Date"/> <br/>
                Type de carte :
                <select name="type">
                    <option value="Monstre"> Monstre </option>
                    <option value="Magie"> Magie </option>
                    <option value="Piège"> Piège </option>
                    <option value="Terrain"> Terrain </option>
                </select> <br/>
                <?php
                if($type == "Montre"){
                    echo "Attaque :
                    <input type="number" name="Attaque"/> <br/>
                    Défense :
                    <input type="number" name="Défense"/> <br/>
                    Nombres étoiles :
                    <input type="number" name="Etoiles"/> <br/>
                    Etes-vous sûre de créer la carte :
                    <input type="submit" name="Valider"/>";
                }
                ?>
            </p>
        </div>

    </body>
</html>
