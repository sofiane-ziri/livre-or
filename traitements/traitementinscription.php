<?php

require '../classes/User.php';
if(isset($_POST['submit'])){
    $objet = new User;
    $objet->register($_POST['login'], $_POST['password'], $_POST['password2']);
}
?>