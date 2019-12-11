<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Carteirb</h5>
                <p class="grey-text text-lighten-4">Site de collection de cartes en ligne</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Navigation</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="/index.php">Accueil</a></li>
                  <?php if (isset($_COOKIE["id_joueur"])) {
                    echo "<li><a class=\"grey-text text-lighten-3\" href=\"logout.php\">Se déconnecter</a></li>";
                    echo "<li><a class=\"grey-text text-lighten-3\" href=\"Joueurs.php?id=".$_COOKIE["id_joueur"]."\">Mon profil</a></li>";
                  } else {
                    echo "<li><a class=\"grey-text text-lighten-3\" href=\"login.php\">Se connecter</a></li>";
                  } ?>
                  <li><a class="grey-text text-lighten-3" href="/Joueurs.php">Joueurs</a></li>
                  <li><a class="grey-text text-lighten-3" href="/Cards.php">Cartes</a></li>
                  <li><a class="grey-text text-lighten-3" href="/Decks.php">Decks</a></li>
                  <li><a class="grey-text text-lighten-3" href="/Editions.php">Editions</a></li>
                  <li><a class="grey-text text-lighten-3" href="/Tournois.php">Tournois</a></li>
                  <li><a class="grey-text text-lighten-3" href="/Contact.php">À propos de nous</a></li>

                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright Text
            </div>
          </div>
</footer>
