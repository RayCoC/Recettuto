
<?php
class ModeleAuthentification extends Connexion {

    public function connexion($login) {
        $requete= self::$bdd->prepare("SELECT * from InfoConfidentielles where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetch();
    }

    public function ajoutUtilisateur($nomUtilisateur, $mdp,$nom,$prenom,$age,$sexe){

        $req2 = self::$bdd->prepare("insert into InfoConfidentielles (login,password) values (:login,:password);");
        $req2->bindParam('login',$nomUtilisateur);
        $req2->bindParam('password',$mdp);
        $res2 = $req2->execute();

        $req = self::$bdd->prepare("insert into Utilisateur (nom,prenom,dateInscription,sexe,age,login,idrole) values (:nom,:prenom,CURRENT_DATE,:sexe,:age,:login,1);");
        $req->bindParam('nom',$nom);
        $req->bindParam('prenom',$prenom);
        $req->bindParam('age',$age);
        $req->bindParam('sexe',$sexe);
        $req->bindParam('login',$nomUtilisateur);
        $res = $req->execute();

        $req3= self::$bdd->prepare("SELECT idutilisateur from utilisateur where login = :login");
        $req3->bindParam('login',$nomUtilisateur);
        $res3 = $req3->fetch();
        echo "JE SUIS RES3";
        echo $res3;

        $req4 = self::$bdd->prepare("update InfoConfidentielles set idutilisateur=:idutilisateur where login=:login;");
        $req4->bindParam('login',$nomUtilisateur);
        $req4->bindParam('idutilisateur',$res3);
        $res4 = $req4->execute();


    }


}