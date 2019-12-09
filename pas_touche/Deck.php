<?php
include "Header.php";
?>

<div class="nav">
    <a href="index.php">Accueil</a>
    <a href="Modification.php">Modification</a>
    <a class="active" href="Deck.php">Deck </a>
    <a href="Tournoi.php">Tournoi </a>
    <a href="Contact.php">A propos de nous</a>
</div>

<div class="content">
    <h1> Modification des decks </h1>
    <div class="add">
        <h2> Ajout d'un deck </h2>
        <p>
            <form action="creer_Deck.php" method="post">
                Titre :
                <input type="text" name="title"/> <br/>
                <input type="submit" name="submit"/>
            </form>
        </p>
    </div>
    <div class="add">
        <h2> Modifier un deck </h2>
        Sélection du deck : Salut
        <!-- <?php

        ?> -->
    </div>
</div>
