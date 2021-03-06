<?php
session_start();
require_once 'connect-bdd.php'; // On inclut la connexion à la base de données
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
<!doctype html>
<html lang="fr">

<head>
    <title>Espace membre</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-User-essential-collection-bearicons-glyph-bearicons.png" type="image/x-con">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php
include "../livre-or/header.php"
?>
    <div class="container">
        <div class="text-center">
            <div class="col-md-12">
                <?php
                if (isset($_GET['err'])) {
                    $err = htmlspecialchars($_GET['err']);
                    switch ($err) {
                        case 'current_password':
                            echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                            break;

                        case 'success_password':
                            echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                            break;
                    }
                }
                ?>
                <h1 class="p-5">Bonjour <?php echo $_SESSION['user']['prenom']; ?> !</h1>
                <?php
                /* Affiche la page admin seulement pour l'utilisateur admin */
                if (isset($_SESSION['user']['id'])) {
                    if ($_SESSION['user']['id'] == 1) {
                        echo '<a class="btn btn-secondary" href="admin.php">Dashboard</a>';
                    }
                }
                ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#change_password">
                    Changer mon mot de passe
                </button>
                <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Changer mon mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="layouts/change_password.php" method="POST">
                        <label for='current_password'>Mot de passe actuel</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required />
                        <br />
                        <label for='new_password'>Nouveau mot de passe</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" required />
                        <br />
                        <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                        <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required />
                        <br />
                        <button type="submit" class="btn btn-success">Sauvegarder</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>