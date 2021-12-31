<?php
class ModeleRecette extends Connexion {
    function __construct()
    {
    }

    function selectionRecette ($selection) {
        $requete= self::$bdd->prepare("SELECT * from TypePlat where nomType = :selection");
        $requete->bindParam('selection',$selection);
        $requete->execute();
        return $requete->fetch();
    }
    public static function insertImage ($url) {
        $det = self::$bdd->prepare("INSERT INTO image (img) VALUES (:url);");
        $det->bindParam('url',$url);
        $det->execute();
    }
    function verifHashtagDejaExistant($nomHashtag) {
        $requete = self::$bdd->prepare("SELECT * from hashtag where nomHashtag = :nom");
        $requete->bindParam('nom', $nomHashtag);
        $requete->execute();
        return $requete->rowCount();
    }
    function ajoutHashtag() {
        if (!empty($_SESSION['hashtag'])) {
            foreach ($_SESSION['hashtag'] as $item => $result) {
                if ($this->verifHashtagDejaExistant($result['nomHashtag'])==0) {
                    $requete = self::$bdd->prepare ("INSERT INTO hashtag values (:nom)");
                    $requete->bindParam('nom', $result['nomHashtag']);
                    $requete->execute();
                }
                $requete = self::$bdd->prepare("INSERT INTO lier values (:nomHashtag, :idRecette)");
                $requete->bindParam('nomHashtag', $result['nomHashtag']);
            }
        }
        unset($_SESSION['hashtag']);
    }
    function creerNouvelleRecette($data) {
        $requete = self::$bdd->prepare("INSERT INTO recette (titre,tpsPrepa, image, calories,tpsCuisson,textRecette,idType,nbFlammes) VALUES (:titre,:temps,:url,:calories,:cuisson,:descritpion,:typePlat,:difficulte)");
        $requete->bindParam('url',$data['img']);
        $requete->bindParam('titre',$data['titre']);
        $requete->bindParam('temps',$data['temps']);
        $requete->bindParam('calories',$data['calories']);
        $requete->bindParam('cuisson',$data['cuisson']);
        $requete->bindParam('difficulte',$data['difficulte']);
        $requete->bindParam('typePlat',$data['typePlat']);
        $requete->bindParam('descritpion',$data['description']);
        $requete->execute();
        return self::$bdd->lastInsertId();
    }
    function ajouterIngredient($lastIDRecette) {
        if (! empty($_SESSION['ingredient'])) {
            foreach ($_SESSION['ingredient'] as $item => $result) {
                $requete = self::$bdd->prepare("INSERT INTO ingredient (nom) values (:nom)");
                $requete->bindParam('nom', $result['nomIngredient']);
                $requete->execute();
                $lastIdIng = self::$bdd->lastInsertId();
                $requete = self::$bdd->prepare("INSERT INTO composer values (:quantite,:uniteIngr, :idRec, :idIng)");
                $requete->bindParam('quantite', $result['quantite']);
                $requete->bindParam('uniteIngr', $result['unite']);
                $requete->bindParam('idRec', $lastIDRecette);
                $requete->bindParam('idIng',$lastIdIng);
                $requete->execute();
            }
        }
        unset($_SESSION['ingredient']);
    }
    public function ajoutIngredientTableau($nomIngredient, $quantite, $unite)
    {
        if (($nomIngredient != "" or $quantite != "" or $unite != "") and self::verifieDoublon($nomIngredient)) {
            $_SESSION['id']++;
            $i = $_SESSION['id'];
            $_SESSION['ingredient'][$i] = array('nomIngredient' => $nomIngredient, 'quantite' => $quantite, 'unite' =>$unite);
        }
    }
    static function verifieDoublon($nomIngredient) {
        if (!empty($_SESSION['ingredient'])) {
            foreach($_SESSION['ingredient'] as $item=> $val) {
                if ($val['nomIngredient'] == $nomIngredient) {
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
                    return "la taille est trop élevée";
                } else {
                    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $allExt = array("jpg", "png", "jpeg");
                    if (in_array($extension, $allExt)) {
                        $insertImg = uniqid('', true) . "." . $extension;
                        $insertDestination = 'img/img_upload/' . $insertImg;
                        move_uploaded_file($tmpName, $insertDestination);
                        return $insertDestination;
                    } else {
                        return "Format inconnu";
                    }
                }
            }
        } else {
            return "Veuilez entrer une image";
        }
    }
    public function ajoutHashtagTableau($hashtag)
    {
        if ($hashtag !="") {
            $_SESSION['idHashtag']++;
            $i = $_SESSION['idHashtag'];
            $_SESSION['hashtag'][$i] = array('nomHashtag' => $hashtag);
        }
    }
    function modifieIngredient($nomIngredient, $quantite, $unite, $update) {
        foreach ($_SESSION['ingredient'] as $item => $value) {
            echo $value['nomIngredient'];
            echo $value['quantite'];
            echo $value['unite'];
        }
    }
}