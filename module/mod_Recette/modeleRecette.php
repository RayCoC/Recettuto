<?php
class ModeleRecette extends Connexion
{
    function __construct()
    {
    }

    function selectionRecette($selection)
    {
        $requete = self::$bdd->prepare("SELECT * from TypePlat where nomType = :selection");
        $requete->bindParam('selection', $selection);
        $requete->execute();
        return $requete->fetch();
    }

    public static function insertImage($url)
    {
        $det = self::$bdd->prepare("INSERT INTO image (img) VALUES (:url);");
        $det->bindParam('url', $url);
        $det->execute();
    }

    function verifHashtagDejaExistant($nomHashtag)
    {
        $requete = self::$bdd->prepare("SELECT * from Hashtag where nomHashtag = :nom");
        $requete->bindParam('nom', $nomHashtag);
        $requete->execute();
        return $requete->rowCount();
    }

    function ajoutHashtag()
    {
        if (!empty($_SESSION['hashtag'])) {
            foreach ($_SESSION['hashtag'] as $item => $result) {
                if ($this->verifHashtagDejaExistant($result['nomHashtag']) == 0) {
                    $requete = self::$bdd->prepare("INSERT INTO Hashtag values (:nom)");
                    $requete->bindParam('nom', $result['nomHashtag']);
                    $requete->execute();
                }
                $requete = self::$bdd->prepare("INSERT INTO Lier values (:nomHashtag, :idRecette)");
                $requete->bindParam('nomHashtag', $result['nomHashtag']);
                $requete->execute();
            }
        }
        unset($_SESSION['hashtag']);
    }

    function creerNouvelleRecette($data)
    {
        $requete = self::$bdd->prepare("INSERT INTO Recette (titre,tpsPrepa, image, calories,tpsCuisson,textRecette,idType,nbFlammes) VALUES (:titre,:temps,:url,:calories,:cuisson,:descritpion,:typePlat,:difficulte)");
        $requete->bindParam('url', $data['img']);
        $requete->bindParam('titre', $data['titre']);
        $requete->bindParam('temps', $data['temps']);
        $requete->bindParam('calories', $data['calories']);
        $requete->bindParam('cuisson', $data['cuisson']);
        $requete->bindParam('difficulte', $data['difficulte']);
        $requete->bindParam('typePlat', $data['typePlat']);
        $requete->bindParam('descritpion', $data['description']);
        $requete->execute();
        return self::$bdd->lastInsertId();
    }

    function ajouterIngredient($lastIDRecette)
    {
        if (!empty($_SESSION['ingredient'])) {
            foreach ($_SESSION['ingredient'] as $item => $result) {
                $requete = self::$bdd->prepare("INSERT INTO Ingredient (nom) values (:nom)");
                $requete->bindParam('nom', $result['nomIngredient']);
                $requete->execute();
                $lastIdIng = self::$bdd->lastInsertId();
                $requete = self::$bdd->prepare("INSERT INTO Composer values (:quantite,:uniteIngr, :idRec, :idIng)");
                $requete->bindParam('quantite', $result['quantite']);
                $requete->bindParam('uniteIngr', $result['unite']);
                $requete->bindParam('idRec', $lastIDRecette);
                $requete->bindParam('idIng', $lastIdIng);
                $requete->execute();
            }
        }
        unset($_SESSION['ingredient']);
    }

    public function ajoutIngredientTableau($nomIngredient, $quantite, $unite)
    {
        if (($nomIngredient != "" or $quantite != "" or $unite != "") and self::verifieDoublon($nomIngredient, 'ingredient', 'nomIngredient')) {
            $_SESSION['id']++;
            $i = $_SESSION['id'];
            $_SESSION['ingredient'][$i] = array('nomIngredient' => $nomIngredient, 'quantite' => $quantite, 'unite' => $unite);
        }
    }

    static function verifieDoublon($value, $dataValue, $column)
    {
        if (!empty($_SESSION[$dataValue])) {
            foreach ($_SESSION[$dataValue] as $item => $val) {
                if ($val[$column] == $value) {
                    return false;
                }
            }
        }
        return true;
    }

    function uploadImage()
    {
        if (isset($_POST['submit']) && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $tmpName = $_FILES['file']['tmp_name'];
            $error = $_FILES['file']['error'];
            if ($error == 0) {
                if ($fileSize > 12500000) {
                    //"la taille est trop élevée";
                    return "false";
                } else {
                    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $allExt = array("jpg", "png", "jpeg");
                    if (in_array($extension, $allExt)) {
                        $insertImg = uniqid('', true) . "." . $extension;
                        $insertDestination = './img/img_upload/' . $insertImg;
                        move_uploaded_file($tmpName, $insertDestination);
                        return $insertDestination;
                    } else {
                        //"Format inconnu";
                        return "false";
                    }
                }
            }
        } else {
            //"Veuilez entrer une image";
            return "false";
        }
    }

    public function ajoutHashtagTableau($hashtag)
    {
        if ($hashtag != "" and self::verifieDoublon($hashtag, 'hashtag', 'nomHashtag')) {
            array_push($_SESSION['hashtag'], array('nomHashtag' => $hashtag));
            /*$_SESSION['hashtag'][$i] = array('nomHashtag' => $hashtag);*/
        }
    }

    function modifieIngredient($nomIngredient, $quantite, $unite, $update)
    {
        foreach ($_SESSION['ingredient'] as $item => $value) {
            if ($value['nomIngredient'] == $update) {
                $_SESSION['ingredient'][$item]['nomIngredient'] = $nomIngredient;
                $_SESSION['ingredient'][$item]['quantite'] = $quantite;
                $_SESSION['ingredient'][$item]['unite'] = $unite;
            }
        }
    }
    function modifieHashtag($nomHashtag, $update) {
        foreach ($_SESSION['hashtag'] as $item => $value) {
            if ($value['nomHashtag'] == $update) {
                $_SESSION['hashtag'][$item]['nomHashtag'] = $nomHashtag;
            }
        }
    }
    function  supprimerHashtag ($delete) {
        foreach ($_SESSION['hashtag'] as $item => $value) {
            if ($value['nomHashtag'] == $delete) {
                unset($_SESSION['hashtag'][$item]);
            }
        }
    }
    function supprimerIngredient($delete)
    {
        foreach ($_SESSION['ingredient'] as $item => $value) {
            if ($value['nomIngredient'] == $delete) {
                unset($_SESSION['ingredient'][$item]);
            }
        }
    }
    function filter ($value) {
        if ($value == "1" or $value == "2" or $value =="3" or $value == "4") {
            $requete = self::$bdd->prepare("SELECT * FROM Recette where idType = :value");
            $requete->bindParam('value', $value);
        }
        /*else if ($value = "Populaire") {
            $requete = self::$bdd->prepare("SELECT * FROM Recette wh")
        }*/
        else if ($value == "recent") {
            $requete = self::$bdd->prepapre("SELECT * FROM Recette order by dateCreation desc");
        }
        $requete->execute();
        return $requete->fetchAll();
    }
    function rechercheBy($filtre, $value) {
        if ($filtre == 'titre') {
            $requete = self::$bdd->prepare("SELECT * FROM Recette where titre = :value");
        }
        else if ($filtre == 'hashtag'){
            $requete = self::$bdd->prepare("SELECT * FROM Recette natural join Lier where nomHashtag = :value ");
        }
        else if ($filtre == 'ingredient') {
            $requete = self::$bdd->prepare("SELECT * FROM Recette natural join Composer natural join Ingredient where nom = :value");
        }
        $requete->bindParam(':value', $value);
        $requete->execute();
        return $requete->fetchAll();
    }
    function allRecette() {
        $requete = self::$bdd->prepare("SELECT * FROM Recette");
        $requete->execute();
        return $requete->fetchAll();
    }
    static function messsageError()
    {
        if (isset($_POST['add'])) {
            if (($_POST['nomIngredient']) == "" or ($_POST['quantite']) == "" or ($_POST['unite']) == "") {
                return true;
            }
        }
        else {
            return false;
        }
    }
     function detailsRecette($id) {
        $requete = self::$bdd->prepare("SELECT * FROM Recette where idRec = :id");
        $requete->bindParam('id', $id);
        $requete->execute();
        return $requete->fetchAll();
    }
    function detailsIngreientRecette($id) {
        $requete = self::$bdd->prepare("SELECT * FROM Ingredient natural join Composer where idRec = :id");
        $requete->bindParam('id', $id);
        $requete->execute();
        return $requete->fetchAll();
    }
    function getIdUser() {
        $requete = self::$bdd->prepare("SELECT idUtilisateur where nom =: nom");
        $requete->bindParam('nom', $_SESSION['nomUtilisateur']);
        $requete->execute();
        return $requete->fetchAll();
    }
    function ajoutAvis ($idRec, $avis, $etoiles, $idUser) {
        $requete = self::$bdd->prepare("INSERT INTO Avis (textAvis,nbEtoiles, nbPouceBleu, idUtilisateur, idRec) values (avis, etoiles, 0, idUser, idRec)");
        $requete->bindParam('avis',$avis);
        $requete->bindParam('etoiles', $etoiles);
        $requete->bindParam('idUser', $idUser);
        $requete->bindParam('idRec', $idRec);
        $requete->execute();
        return $requete->fetchAll();
    }
    function avis ($id) {
        $requete = self::$bdd->prepare("SELECT * FROM Avis where idRec = id");
        $requete->bindParam('id', $id);
        $requete->execute();
        return $requete->fetchAll();
    }
}