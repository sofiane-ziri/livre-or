<?php
require_once 'connect-bdd.php'; //connexion à la bdd
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Livre d'or</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    
    <?php
    include "../livre-or/header.php"
    ?>
    <main class="main">
        <?php
        if (isset($_SESSION['user'])) { ?>
            <form action='commentaire.php' method='get'>
                <label for='textarea'>Entrez votre commentaire</label>
                <textarea id='textarea' name='textarea'></textarea>
                <input type='submit' value='envoyer le commentaire' name='submit'>
            </form><?php
            if (isset($_GET['submit'])) {
                foreach ($_GET as $key => $value) {
                    if ($key == "textarea") {
                        $commentaire = $value;
                    }
                }
                
                $date = date("Y/m/d H:i:s");
                $insert = $bdd->prepare("INSERT INTO `commentaires`(`commentaire`,`id_utilisateur`,`date`) VALUES ('{$commentaire}','{$_SESSION['user']['id']}','{$date}')");
                $insert->execute();
                
            }
        }

        ?>
    </main>