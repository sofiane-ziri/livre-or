<?php

require '../classes/User.php';

if(isset($_POST['submit'])){
    $objet = new User;
    $objet->update($_POST['login'], $_POST['password'], $_POST['password2']);
    $objet->disconnect();
}
?>