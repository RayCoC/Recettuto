
<?php
class ModeleAuthentification extends Connexion {

    public function connexion($login) {
        $requete= self::$bdd->prepare("SELECT * from InfoConfidentielles where login = :login");
        $requete->bindParam('login',$login);
        $requete->execute();
        return $requete->fetch();
    }

    public function ajoutUtilisateur($data){

        $chercheLogin =self::$bdd->prepare("SELECT * from Utilisateur where login = :login ");
        $chercheLogin ->bindParam('login',$data['nomUtilisateur']);
        $chercheLogin->execute();
        $user=$chercheLogin->rowCount();

        if($user==0) {

            $req2 = self::$bdd->prepare("insert into InfoConfidentielles (login,password) values (:login,:password);");
            $req2->bindParam('login', $data['nomUtilisateur']);
            $mdp = password_hash($data['mdp'], PASSWORD_DEFAULT);
            $req2->bindParam('password', $mdp);
            $res2 = $req2->execute();

            $req = self::$bdd->prepare("insert into Utilisateur (nom,prenom,dateInscription,sexe,age,login,idrole) values (:nom,:prenom,CURRENT_DATE,:sexe,:age,:login,1);");
            $req->bindParam('nom', $data['nom']);
            $req->bindParam('prenom', $data['prenom']);
            $req->bindParam('age', $data['age']);
            $req->bindParam('sexe', $data['sexe']);
            $req->bindParam('login', $data['nomUtilisateur']);
            $res = $req->execute();


            $req4 = self::$bdd->prepare("update InfoConfidentielles set idutilisateur=:idutilisateur where login=:login;");
            $req4->bindParam('login', $data['nomUtilisateur']);
            $lastIdUtil = self::$bdd->lastInsertId();
            $req4->bindParam('idutilisateur', $lastIdUtil);
            $res4 = $req4->execute();
        }
        else {
            echo "login deja existant ";
        }
    }
    static function verifieEntree($post, $value = null) {

        if (isset($_POST['valider'])) {
            if ($_POST[$post] == "" && $value != 'age') {
                return false;
            }
            else if ($value == "sexe" && ! isset($_POST['sexe'])) {
                return false;
            }
        }
        return true;
    }

}