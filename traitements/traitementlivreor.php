<?php

$_bdd = new PDO("mysql:host=localhost;dbname=livreor", 'root', 'root' );

$tcomm =  $_bdd->prepare("SELECT date, commentaire, login FROM commentaires INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id ORDER BY date DESC");
$tcomm->execute();

?>