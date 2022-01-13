<?php
class ModeleProfil extends Connexion {

    function infoUtilisateur($login){
        $requete= self::$bdd->prepare("SELECT * from Utilisateur where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetchAll();
    }

    function nbRecettes($login){
       $info= $this->infoUtilisateur($login);
        $id=1;

        $requete= self::$bdd->prepare("SELECT * from recette  where idUtilisateur = :id");
        $requete->bindParam('id',$id);
        $requete->execute();
        $res=$requete->rowCount();

        echo $res;
    }

    function modifierProfil($data)
    {


        if (!empty($_POST['nom'])) {
            $sql = 'UPDATE  utilisateur  SET nom=? WHERE login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($data['nom'], $data['nomUtilisateur']));
        }
        if (!empty($_POST['prenom'])) {
            $sql = 'UPDATE  utilisateur  SET prenom=? WHERE login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($data['prenom'],  $data['nomUtilisateur']));
        }
        if (!empty($_POST['age'])) {
            $sql = 'UPDATE  utilisateur  SET age=? WHERE login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($data['age'],  $data['nomUtilisateur']));
        }
        if (!empty($_POST['sexe'])) {
            $sql = 'UPDATE  utilisateur  SET sexe=? WHERE login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($data['sexe'],  $data['nomUtilisateur']));
        }


    }

    function recetteUtilisateur($login){
        $requete= self::$bdd->prepare("SELECT * from Recette natural join Utilisateur where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetchAll();
    }

    function abonnementUtilisateur(){
        $requete = self::$bdd->prepare("SELECT login from utilisateur where idUtilisateur IN (SELECT idUtilisateur_1 from suivre where idUtilisateur = :idUser);");
        $idUser = $this->getIdUser();
        $requete->bindParam('idUser', $idUser[0][0]);
        $requete->execute();
        $listeAbonnement=$requete->fetchAll();

        return $listeAbonnement;
    }

    function commentaireUtilisateur(){
        $requete = self::$bdd->prepare("SELECT * from avis where idUtilisateur = :idUser;");
        $idUser = $this->getIdUser();
        $requete->bindParam('idUser', $idUser[0][0]);
        $requete->execute();
        return $requete->fetchAll();
    }

    function getNomRecette($idRec){
        $requete = self::$bdd->prepare("SELECT titre from recette where idRec = :idRec;");
        $requete->bindParam('idRec', $idRec);
        $requete->execute();
        return $requete->fetchAll();
    }

    function getIdUser()
    {
        $requete = self::$bdd->prepare("SELECT * from Utilisateur where login = :login");
        $requete->bindParam('login', $_GET['login']);
        $requete->execute();
        return $requete->fetchAll();
    }
}