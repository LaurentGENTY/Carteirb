<?php
include "Header.php";
include "connect.php";

/* si on est deja connecte on sen va */
if(isset($_COOKIE["id_joueur"])) {
  header('Location: /index.php');
  exit();
}

/* si on vient de soummettre le formulaire */
if(isset($_GET["nom"]) && isset($_GET["prenom"])) {
  $req = "SELECT Joueurs.id_joueur FROM Joueurs WHERE nom = ? AND prenom = ?";

  if ($stmt = mysqli_prepare($connection, $req)) {

      /* Exécution de la requête */
      mysqli_stmt_execute($stmt);

      /* Association des variables de résultat */
      mysqli_stmt_bind_result($stmt, $i);

      /* Lecture des valeurs */
      while (mysqli_stmt_fetch($stmt)) {
        setcookie("id_joueur", $id, time()+3600);
      }

      /* Fermeture de la commande */
      mysqli_stmt_close($stmt);
  }
}
?>


<div class="row">
  <form class="col s12" method="get">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <label for="nom">Nom</label>
          <input id="nom" type="text" class="validate" name="nom">
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <label for="prenom">Prénom</label>
          <input id="prenom" type="text" class="validate" name="prenom">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <label for="pseudo">Pseudo</label>
          <input id="pseudo" type="text" class="validate" name="pseudo">
        </div>
      </div>
  <button class="btn waves-effect waves-light" type="submit">Se connecter
    <i class="material-icons right">send</i>
  </button>
  </form>
</div>
