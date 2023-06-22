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
        <title>Ecrire Sur le livre</title>
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
            <div class="mainC">
                <form method="POST" action="../traitements/traitementSendcomm.php">
                    <h1>Commentaire</h1>
                    <textarea class="comm" name="Commentaire" placeholder="Commentaire"></textarea></br>

                    <input class="submit" type="submit" name="submit" value="Envoyer"></br>

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