<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Inscription</title>
</head>

<body>
    <header>
        <nav>
            <ul class="nav_links">
                <img src="../image/livre-ouvert.png" class="logo">
                <li><a href="../index.php">Accueil</a></li>
                <?php session_start();
                if (!isset($_SESSION['id'])) {
                    echo " <li><a href=\"connexion.php\">Connexion</a></li>";
                } ?>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"Sendcomm.php\">Postez sur livre</a></li>";
                } ?>
                <li><a href="livreor.php">livre d'or</a></li>
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
        <div class="maini">
            <form method="POST" action="../traitements/traitementinscription.php">
                <h1>Inscription</h1>

                <input type="text" name="login" placeholder="Login" maxlength="255" value="<?php if (isset($_SESSION['login'])) {
                                                                                                echo "$_SESSION[login]";
                                                                                            } ?>"></br>

                <input type="password" name="password" placeholder="Password" maxlength="255"></br>

                <input type="password" name="password2" placeholder="Confirmation" maxlength="255"></br>

                <input class="submit" type="submit" name="submit" value="S'inscire"></br>
                <?php
                if (isset($_SESSION['fail'])) {
                    echo "$_SESSION[fail]" . "<br>";
                    unset($_SESSION['fail']);
                } ?>
            </form>
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