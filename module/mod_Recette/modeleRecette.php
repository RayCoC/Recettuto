<?php
class ModeleRecette extends Connexion {
    function selectionRecette ($selection) {
        $requete= self::$bdd->prepare("SELECT * from TypePlat where nomType = :selection");
        $requete->bindParam('selection',$selection);
        $requete->execute();
        return $requete->fetch();
    }
    public static function uploadImage () {
        if (isset($_POST['submit']) && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $tmpName = $_FILES['file']['tmp_name'];
            $error = $_FILES['file']['error'];
            if ($error == 0) {
                if ($fileSize > 12500000) {
                    return "la taille est trop élevée";
                }
                else {
                    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $allExt = array("jpg", "png", "jpeg");
                    if (in_array($extension, $allExt)) {
                        $insertImg = uniqid('', true).".".$extension;
                        $insertDestination = 'img/img_upload/'.$insertImg;
                        move_uploaded_file($tmpName,$insertDestination);
                        return "true";
                    }
                    else {
                        return "Format inconnu";
                    }
                }
            }
        }
        else {
            return "Veuilez entrer une image";
        }
    }
}