<?php
class ModeleAcceuil extends Connexion
{
    function __construct()
    {
    }

    function recetteRecent()
    {
        $requete= self::$bdd->prepare("SELECT idRec ,titre, image FROM Recette order by STR_TO_DATE(dateCreation, '%Y-%m-%d') DESC limit 3");
        $requete->execute();
        return $requete->fetchAll();
    }

    function recettePopulaire()
    {
        $requete = self::$bdd->prepare("SELECT idRec ,titre, image  FROM Recette order by note desc limit 4");
        $requete->execute();
        return $requete->fetchAll();
    }

}