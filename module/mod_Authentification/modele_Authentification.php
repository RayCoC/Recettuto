
<?php
class ModeleAuthentification extends Connexion {

    public function connexion($login) {
        $requete= self::$bdd->prepare("SELECT * from InfoConfidentielles where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetch();
    }

    public function ajoutUtilisateur($nomUtilisateur, $mdp,$nom,$prenom){

        $req = self::$bdd->prepare("insert into Utilisateur (nom,prenom) values (:nom,:prenom);");
        $req->bindParam('nom',$nom);
        $req->bindParam('prenom',$prenom);
        $res = $req->execute();

        // $req = self::$bdd->prepare("insert into InfoConfidentielles (login,password) values (:login,:password);");
        // $req->bindParam('login',$nomUtilisateur);
        // $req->bindParam('password',$mdp);
        // $res = $req->execute();


        // $this->ajoutUtilisateurEtape2($nom,$prenom);

        
    }

    public function ajoutUtilisateurEtape2($nom, $prenom){
        $req = self::$bdd->prepare("insert into Utilisateur (nom,prenom,dateInscription) values (:nom,:prenom,CURRENT_DATE);");
        $req->bindParam('nom',$nom);
        $req->bindParam('prenom',$prenom);
        $res = $req->execute();

        
        
    }

}