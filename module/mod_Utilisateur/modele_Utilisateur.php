<?php

class ModeleUtilisateur extends Connexion
{
    function searchUser($login)
    {
        $requete = self::$bdd->prepare("SELECT * from Utilisateur where login LIKE ?");
        $requete->execute(array($login . '%'));
        return $requete->fetchAll();
    }

    function bannir($id)
    {
        $requete = self::$bdd->prepare("UPDATE Utilisateur set idRole = 1 where idUtilisateur = ?");
        $requete->execute(array($id));
    }
}