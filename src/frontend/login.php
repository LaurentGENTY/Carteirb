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
  $nom_joueur = $_GET["nom"];
  $prenom_joueur = $_GET["prenom"];

  $requete="SELECT Joueurs.id_joueur
            FROM Joueurs
            WHERE nom = ? AND prenom = ?";

  if ($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('ss', $nom_joueur, $prenom_joueur);
      $stmt->bind_result($id_j);
      $stmt->execute();

      while($stmt->fetch()) {
        if(!is_null($id_j)) {
          setcookie("id_joueur", $id_j, time()+3600);  /* expire dans 1 heure */
          $stmt->close();
          header('Location: /index.php');
        } else {
        $stmt->close();
        header('Location: /login.php');
        }
      }

      exit();
    }
}
?>


<div class="row">
  <form class="col s12" method="get">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <label for="nom" class="active">Nom</label>
          <input placeholder="Nom" id="nom" type="text" class="validate" name="nom">
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <label for="prenom" class="active">Prénom</label>
          <input placeholder="Prénom" id="prenom" type="text" class="validate" name="prenom">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <label for="pseudo" class="active">Pseudo</label>
          <input placeholder="Pseudo" id="pseudo" type="text" class="validate" name="pseudo">
        </div>
      </div>
  <button class="btn waves-effect waves-light" type="submit">Se connecter
    <i class="material-icons right">send</i>
  </button>
  </form>
</div>

<?php
include "Footer.php";
?>
