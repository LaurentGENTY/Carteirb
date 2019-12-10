<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Carteirb </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="footer.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper">
            <a href="index.php" class="brand-logo"><i class="material-icons">sd_card</i>Carteirb</a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php"><i class="material-icons">home</i>Accueil</a></li>
              <?php if (isset($_COOKIE["id_joueur"])) {
                echo "<li><a href=\"logout.php\"><i class=\"material-icons\">people</i>Se déconnecter</a></li>";
              } else {
                echo "<li><a href=\"login.php\"><i class=\"material-icons\">people</i>Se connecter</a></li>";
              } ?>
              <li><a href="Cards.php"><i class="material-icons">search</i>Cartes</a></li>
              <li><a href="Decks.php"><i class="material-icons">card_membership</i>Decks</a></li>
              <li><a href="Tournois.php"><i class="material-icons">place</i>Tournois</a></li>
              <li><a href="Contact.php"><i class="material-icons">people</i>À propos de nous</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </body>
</html>
