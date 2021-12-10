
<?php
class ModeleAuthentification extends Connexion {

    public function connexion($login) {
        $requete= self::$bdd->prepare("SELECT * from InfoConfidentielles where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetch();
    }
}