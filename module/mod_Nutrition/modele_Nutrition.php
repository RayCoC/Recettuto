<?php
class ModeleNutrition extends Connexion
{

    function ajoutPlat($data)
    {
        $requete = self::$bdd->prepare("INSERT INTO nutrition (nomPlat,nbKCal,dateConsomme,idUtilisateur) VALUES (:nomPlat,:nbCalories,CURRENT_DATE,:idUser)");
        $requete->bindParam('nomPlat', $data['nomPlat']);
        $requete->bindParam('nbCalories', $data['nbCalories']);
        $idUser = $this->getIdUser();
        $requete->bindParam('idUser', $idUser[0][0]);
        $requete->execute();
    }

    function getIdUser()
    {
        $requete = self::$bdd->prepare("SELECT *  from Utilisateur where login = :login");
        $requete->bindParam('login', $_SESSION['nomUtilisateur']);
        $requete->execute();
        return $requete->fetchAll();
    }

    function getNbKcal()
    {
        $requete = self::$bdd->prepare("SELECT sum(nbKcal) from Nutrition where idUtilisateur = :idUser and dateConsomme=DATE(NOW())");
        $idUser = $this->getIdUser();
        $requete->bindParam('idUser', $idUser[0][0]);
        $requete->execute();
        return $requete->fetchAll();
    }

    function getNbKcalRecommande(){

        $requete = self::$bdd->prepare("SELECT sexe, age from Utilisateur where login = :login");
        $requete->bindParam('login', $_SESSION['nomUtilisateur']);
        $requete->execute();
        $data = $requete->fetchAll();
        if (!empty($data)) {
            $sexe = NULL;
            $age = NULL;
            foreach ($data as $item => $value) {
                $sexe = $value[0];
                $age = $value[1];
            }
            $nbKcalRecommande=2300;
            if ($sexe == 0) {
                if ($age >= 20 or $age <= 40) {
                    $nbKcalRecommande = 2700;
                }
                elseif($age >= 41) {
                    $nbKcalRecommande = 2500 ;
                }
            } else {
                if ($age >= 20 or $age <= 40) {
                    $nbKcalRecommande = 2200;
                }
                elseif($age >= 41) {
                    $nbKcalRecommande = 2000;
                }
            }
            return $nbKcalRecommande;
        }
    }

}