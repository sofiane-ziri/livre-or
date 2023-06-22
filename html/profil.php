<?php
session_start();
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/index.css">
        <title>Profil</title>
    </head>

    <body>
        <header>
            <nav>
                <ul class="nav_links">
                    <img src="../image/livre-ouvert.png" class="logo">
                    <li><a href="../index.php">Accueil</a></li>
                    <?php if (!isset($_SESSION['id'])) {
                        echo " <li><a href=\"inscription.php\">Inscription</a></li>";
                    } ?>
                    <?php if (!isset($_SESSION['id'])) {
                        echo " <li><a href=\"connexion.php\">Connexion</a></li>";
                    } ?>
                    <?php if (isset($_SESSION['id'])) {
                        echo " <li><a href=\"Sendcomm.php\">Postez sur livre</a></li>";
                    } ?>
                    <li><a href="livreor.php">livre d'or</a></li>
                    <?php if (isset($_SESSION['id'])) {
                        echo " <li><a href=\"deconnexion.php\">Deconnexion</a></li>";
                    } ?>
                </ul>
            </nav>
        </header>
        <main class="main2">
            <div class="maind">
                <h1>Edition profil</h1>
                <form method="POST" action="../traitements/traitementprofil.php">
                    <input type="text" name="login" placeholder="Login" value="<?php if (isset($_SESSION['login'])) {
                                                                                    echo "$_SESSION[login]";
                                                                                } ?>"></br>

                    <input type="password" name="password" placeholder="Password"></br>

                    <input type="password" name="password2" placeholder="Confirmation"></br>

                    <input class="submit" type="submit" name="submit" value="Modifier le Profil"></br>
                    <?php if (isset($_SESSION['fail'])) {
                        echo "$_SESSION[fail]" . "<br>";
                        unset($_SESSION['fail']);
                    } ?>
                    <!--Affiche la varibale qui contient l'erreur-->
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
<?php
} else {
    header("Location:connexion.php");
}
?>