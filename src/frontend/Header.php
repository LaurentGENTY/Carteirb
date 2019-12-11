<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Carteirb </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
        </script>
         <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
      </script>
    </head>
    <body>
          <nav>
           <div class="nav-wrapper">
             <a href="index.php" class="brand-logo"><i class="material-icons">sd_card</i>Carteirb</a>
             <ul class="right hide-on-med-and-down">
               <?php if (isset($_COOKIE["id_joueur"])) {
                 echo "<span>Connecté en tant que joueur ".$_COOKIE["id_joueur"]."</a></li>";
               } ?>
               <li><a href="index.php"><i class="material-icons">home</i>Accueil</a></li>
               <?php if (isset($_COOKIE["id_joueur"])) {
                 echo "<li><a href=\"logout.php\"><i class=\"material-icons\">people</i>Se déconnecter</a></li>";
                 echo "<li><a href=\"Exemplaires.php?id=".$_COOKIE["id_joueur"]."\"><i class=\"material-icons\">people</i>Mes cartes</a></li>";
               } else {
                 echo "<li><a href=\"login.php\"><i class=\"material-icons\">people</i>Se connecter</a></li>";
               } ?>
               <li><a href="/Joueurs.php"><i class="material-icons">pregnant_woman</i>Joueurs</a></li>
               <li><a href="/Cards.php"><i class="material-icons">search</i>Cartes</a></li>
               <li><a href="/Decks.php"><i class="material-icons">card_membership</i>Decks</a></li>
               <li><a href="/Editions.php"><i class="material-icons">book</i>Editions</a></li>
               <li><a href="/Tournois.php"><i class="material-icons">place</i>Tournois</a></li>
               <li><a href="/Contact.php"><i class="material-icons">people</i>À propos de nous</a></li>
             </ul>
           </div>
          </nav>
    </body>
</html>
