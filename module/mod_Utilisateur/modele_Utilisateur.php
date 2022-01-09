<?php
    class ModeleUtilisateur extends Connexion {
        function searchUser($login) {
            $requete = self::$bdd->prepare("SELECT * from Utilisateur where login LIKE ?");
            $requete->execute(array($login.'%'));
            return $requete->fetchAll();
        }
    }