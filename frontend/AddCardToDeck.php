<?php
include "connect.php";
include "Header.php";

if(isset($_POST["id_card"]) && isset($_POST["id_deck"])) {
  $id_card = $_POST["id_card"];
  $id_deck = $_POST["id_deck"];

  addCardDeck($connection,$id_card,$id_deck);
} else {
  searchDeck($connection);
}

/* ajouter une carte dans un deck */
function addCardDeck($connection,$id_card,$id_deck) {

  $requete = "INSERT INTO Deck_contient_carte VALUES (?, ?)";

  if($stmt = $connection->prepare($requete)) {

      $stmt->bind_param('ii', $id_card,$id_deck);

      $stmt->execute();
      $stmt->close();
  }
  header('Location: /Decks.php?id='.$id_deck);
  exit();
}

function searchDeck($connection) {

    ?>
    <div class="row">
      <form class="col s12" method="post">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">format_list_numbered</i>
              <label for="id_card">Id carte</label>"
              <input id="id_card" type="text" class="validate" name="id_card">
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">format_list_numbered</i>
              <label for="id_deck">Id deck</label>
              <input id="id_deck" type="text" class="validate" name="id_deck">
            </div>
          </div>
      <button class="btn waves-effect waves-light" type="submit">Ajouter
        <i class="material-icons right">add</i>
      </button>
      </form>
    </div>
    <?php
}

include "Footer.php";
?>
