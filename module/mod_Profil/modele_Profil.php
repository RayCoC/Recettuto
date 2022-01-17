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
        if (!empty($_POST['password'])) {
            $sql = 'UPDATE  infoconfidentielles  SET password=? WHERE login =? ';
            $req = self::$bdd->prepare($sql);
            $req->execute(array($data['password'],  $data['nomUtilisateur']));
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

    function getIdUserSession(){
        $requete = self::$bdd->prepare("SELECT * from Utilisateur where login = :login");
        $requete->bindParam('login', $_SESSION['nomUtilisateur']);
        $requete->execute();
        return $requete->fetchAll();
    }

    function abonner(){
        $requete = self::$bdd->prepare("INSERT INTO suivre values(:idUser, :idAbonnement)");

        $idUser = $this->getIdUserSession();
        $requete->bindParam('idUser', $idUser[0][0]);

        $idAbonnement = $this->getIdUser();
        $requete->bindParam('idAbonnement', $idAbonnement[0][0]);
        $requete->execute();
        return $requete->fetchAll();
    }

    function desabonner(){
        $requete = self::$bdd->prepare("DELETE FROM suivre WHERE idUtilisateur = :idUser AND idUtilisateur_1 = :idAbonnement");

        $idUser = $this->getIdUserSession();
        $requete->bindParam('idUser', $idUser[0][0]);

        $idAbonnement = $this->getIdUser();
        $requete->bindParam('idAbonnement', $idAbonnement[0][0]);
        $requete->execute();
        return $requete->fetchAll();
    }

    static function estAbonne(){

        $requete = self::$bdd->prepare("SELECT idUtilisateur_1 from suivre where idUtilisateur = :idUser");

        $requete2 = self::$bdd->prepare("SELECT * from Utilisateur where login = :login");
        $requete2->bindParam('login', $_SESSION['nomUtilisateur']);
        $requete2->execute();
        $idUser = $requete2->fetchAll();
        $requete->bindParam('idUser', $idUser[0][0]);
        $requete->execute();
        $abonnes = $requete->fetchAll();

        $requete3 = self::$bdd->prepare("SELECT * from Utilisateur where login = :login");
        $requete3->bindParam('login', $_GET['login']);
        $requete3->execute();
        $idAbonne = $requete3->fetchAll();

        foreach ($abonnes as $item => $value){
            if($value[0]==$idAbonne[0][0]){
                return true;
            }
        }
        return false;
    }
    public function avisSignaler(){
        $requete = self::$bdd->prepare("SELECT textAvis, login, idAvis from avis natural join utilisateur where idAvis IN (SELECT distinct(idAvis) from signaler)");
        $requete->execute();
        return $requete->fetchAll();
    }
    public function bannir($idAvis){
        $this->enleverSignalement($idAvis);

        $requete = self::$bdd->prepare("SELECT idUtilisateur from avis where idAvis = $idAvis");
        $requete->execute();
        $idUser = $requete->fetchAll();

        $requete2 = self::$bdd->prepare("DELETE FROM avis WHERE idAvis = $idAvis");
        $requete2->execute();

        $requete3 = self::$bdd->prepare("UPDATE utilisateur SET idRole=1 WHERE idUtilisateur=:idUser");
        $requete3->bindParam('idUser', $idUser[0][0]);
        $requete3->execute();

    }
    public function enleverSignalement($idAvis){
        $requete = self::$bdd->prepare("DELETE FROM signaler WHERE idAvis = $idAvis");
        $requete->execute();
    }

}