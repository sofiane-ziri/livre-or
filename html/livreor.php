<?php
require '../traitements/traitementlivreor.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Livre D'or</title>
</head>

<body>
    <header>
        <nav>
            <ul class="nav_links">
                <img src="../image/livre-ouvert.png" class="logo">
                <li><a href="../index.php">Accueil</a></li>
                <?php session_start();
                if (!isset($_SESSION['id'])) {
                    echo " <li><a href=\"inscription.php\">Inscription</a></li>";
                } ?>
                <?php if (!isset($_SESSION['id'])) {
                    echo " <li><a href=\"connexion.php\">Connexion</a></li>";
                } ?>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"Sendcomm.php\">Postez sur livre</a></li>";
                } ?>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"profil.php\">Profil</a></li>";
                } ?>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"deconnexion.php\">Deconnexion</a></li>";
                } ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="mainL">
            <h1>Livre D'or</h1>
            <div class="livre">
                <?php while ($result = $tcomm->fetch()) { ?>
                    <p>posté par <?= $result['login']; ?>
                        le <?= $result['date']; ?><br>
                        <?= $result['commentaire']; ?></p><br>
                <?php } ?>
            </div>
        </div>
    </main>
    <footer>
        <div class="resaux">
            <ul class="social-icons">
                <a href="https://github.com/sofiane-ziri/livre-or.git">
                    <img class="git" src="../image/github.png" alt="logo">
                </a>
                <ul>
        </div>
    </footer>
</body>

</html>