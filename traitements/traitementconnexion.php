<?php

require '../classes/User.php';
if(isset($_POST['submit'])){
    $objet = new User;
    $objet->connect($_POST['login'], $_POST['password']);
}
?>
