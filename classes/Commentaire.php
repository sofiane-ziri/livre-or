<?php
session_start();
class Commentaire
{
    public $_Commentaire;

    public function publicomm($_Commentaire)
    {

        $_bdd = new PDO("mysql:host=localhost;dbname=livreor", 'root', 'root');

        $commentaire = htmlspecialchars($_Commentaire);
        $date = date('Y/m/d H:i:s');
        $id = htmlspecialchars($_SESSION['id']);

        $envoiecomm = $_bdd->prepare("INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES(?, ?, ?)");
        $envoiecomm->execute(array($commentaire, $id, $date));
    }
}
