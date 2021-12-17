<?php
class ModeleRecette extends Connexion {
    function selectionRecette ($selection) {
        $requete= self::$bdd->prepare("SELECT * from TypePlat where nomType = :selection");
        $requete->bindParam('selection',$selection);
        $requete->execute();
        return $requete->fetch();
    }
}