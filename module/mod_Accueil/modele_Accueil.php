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
        $requete = self::$bdd->prepare("SELECT idRec ,titre, image FROM Recette where dateCreation>DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH) order by note desc limit 1");
        $requete->execute();
        return $requete->fetchAll();
    }

    function recetteAleatoire()
    {
        $requete = self::$bdd->prepare("SELECT idRec ,titre, image FROM recette ORDER BY RAND()LIMIT 1");
        $requete->execute();
        return $requete->fetchAll();
    }

    function typePlat()
    {
        $requete= self::$bdd->prepare("SELECT idType, nomType FROM typePlat");
        $requete->execute();
        return $requete->fetchAll();
    }

}