<?php

require '../classes/Commentaire.php';
if(isset($_POST['submit'])){
    $objet = new Commentaire;
    $objet->publicomm($_POST['Commentaire']);
    header('Location:../html/livreor.php');
}

?>