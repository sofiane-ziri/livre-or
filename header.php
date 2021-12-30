<?php 
session_start();
require_once 'connect-bdd.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://img.icons8.com/ios-filled/50/000000/share-2.png" type="image/x-con">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Mon Livre d'or</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="profil.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                    if (!isset($_SESSION['user'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='inscription.php'>Inscription</a></li>";
                        echo  "<li class='nav-item'>";
                        echo "<a class='nav-link' href='connexion.php'>Connexion</a></li>";
                    } else {
                        echo "<li class='nav-item'><form action='connexion.php' method='get'><input class='btn btn-link' type='submit' name='disconnect' value='Déconnexion'></form></li>";
                        if (isset($_GET['disconnect'])) {
                            unset($_SESSION['user']);
                            session_destroy();
                            header('Location:connexion.php');
                        }
                        echo "<a class='nav-link' href='commentaire.php'>Lache un comm</a></li>";
                    }
                    ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="livre-or.php">Livre d'or</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>