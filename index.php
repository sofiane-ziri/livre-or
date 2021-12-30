<?php
$db=mysqli_connect('localhost','root','root','livreor');

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "../livre-or/header.php"
?>
    <p>Bienvenu dans le livre d'or</p>  
<main class="main">
    <?php
  
        $req="SELECT utilisateurs.prenom,`commentaire`,`date` FROM commentaires LEFT OUTER JOIN utilisateurs ON utilisateurs.id=commentaires.id_utilisateur"     ;
        $query=mysqli_query($db,$req);
        $results=mysqli_fetch_all($query);
        foreach($results as $key=>$values){
            echo "<div class='card'><div class='card-body'>";
            foreach($values as $key=>$value){
                if($key==0){
                    echo "<h5 class='card-title'>Posté par: ";
                    echo $value;
                    echo "</h5>";

                }
                if($key==1){
                    echo "<h6 class='card-subtitle mb-2 text-muted'>Commentaire:</h6><p class='card-text'>".$value."</p>";

                }
                if($key==2){
                    echo "<footer class='blockquote-footer'>Posté le : ".$value."</footer>";
                }
            }
            echo "</div>";
            echo "</div>";
        }



    ?>
</main>
