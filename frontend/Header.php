<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Carteirb </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
      <nav>
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo"><i class="material-icons">sd_card</i>Carteirb</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php"><i class="material-icons">home</i>Accueil</a></li>
            <?php if (isset($_COOKIE["id_joueur"])) { ?> <li><a href="logout.php"><i class="material-icons">people</i>Se connecter</a></li> <?php }
            else { ?> <li><a href="login.php"><i class="material-icons">people</i>Se connecter</a></li> <?php } ?>
            <li><a href="cards.php"><i class="material-icons">search</i>Cartes</a></li>
            <li><a href="Deck.php"><i class="material-icons">card_membership</i>Decks</a></li>
            <li><a href="Tournoi.php"><i class="material-icons">place</i>Tournois</a></li>
            <li><a href="Contact.php"><i class="material-icons">people</i>À propos de nous</a></li>
          </ul>
        </div>
      </nav>
    </body>
</html>
