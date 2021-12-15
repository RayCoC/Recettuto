
<?php
class ModeleAuthentification extends Connexion {

    public function connexion($login) {
        $requete= self::$bdd->prepare("SELECT * from InfoConfidentielles where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetch();
    }

    function createUser($data){
        $req = self::$conn->prepare("insert into InfoConfidentielles (login,password) values (:login,:password);");
        $req->bindParam('login',$login);
        $req->bindParam('password',$password);
        $res = $req->execute();
        if(!$res) throw new AuthExceptions("L'inscription a échoué!");
    }
}