<?php
session_start();
require_once 'connect-bdd.php';
?>

<footer>
    <ul class="list-group">
        <li class="list-group-item middle"><a href="index.php">Accueil</a></li>
        <?php
        if (!isset($_SESSION['user'])) {
            echo "<li class='list-group-item middle'><a href='connexion.php'>Connexion</a></li><li class='list-group-item middle'><a href='inscription.php'>Inscrivez-vous</a></li>";
        } else {
            echo "<li class='list-group-item middle paddng'><form action='index.php' method='get'><input class='btn btn-link'  type='submit' name='disconnect' value='Déconnexion'></form></li>";
            if (isset($_GET['disconnect'])) {
                unset($_SESSION['user']);
                session_destroy();
                header('Location:index.php');
            }
        }       ?>
    </ul>
    <li class="list-group-item middle"><a href="https://github.com/sofiane-ziri/">Github</a></li>

</footer>