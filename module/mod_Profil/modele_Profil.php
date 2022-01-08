<?php
class ModeleProfil extends Connexion {

    function infoUtilisateur($login){
        $requete= self::$bdd->prepare("SELECT * from Utilisateur where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetchAll();
    }

}