<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Accueil</title>
</head>

<body>
    <header>
        <nav>
            <ul class="nav_links">
                <img src="image/livre-ouvert.png" class="logo">
                <?php session_start();
                if (!isset($_SESSION['id'])) {
                    echo " <li><a href=\"html/inscription.php\">Inscription</a></li>";
                } ?>
                <?php if (!isset($_SESSION['id'])) {
                    echo " <li><a href=\"html/connexion.php\">Connexion</a></li>";
                } ?>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"html/Sendcomm.php\">Postez sur livre</a></li>";
                } ?>
                <li><a href="html/livreor.php">livre d'or</a></li>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"html/profil.php\">Profil</a></li>";
                } ?>
                <?php if (isset($_SESSION['id'])) {
                    echo " <li><a href=\"html/deconnexion.php\">Deconnexion</a></li>";
                } ?>
            </ul>
        </nav>
    </header>
    <main>
        <fieldset class="index">
            <legend>Presentation</legend><br>
            <p> le livre d'or vous permet de mettre des note sous forme de commentaire en etant indelibile
            </p>
        </fieldset>
    </main>
    <footer>
        <div class="resaux">
            <ul class="social-icons">
                <a href="https://github.com/sofiane-ziri/livre-or.git">
                    <img class="git" src="image/github.png" alt="logo">
                </a>
                <ul>
        </div>
    </footer>
</body>

</html>