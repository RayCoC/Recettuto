<?php

class checkAuth
{
    static function can($action, $rule = 0)
    {
        if ($rule == 0) {
            $actions = array('pageAjout', 'form', 'ajoutCommentaire', 'profil', 'mesRecettes', 'historique', 'infoModifier', 'abonnements', 'commentaires');
            if (in_array($action, $actions)) {
                self::redirectConnexion();
            }
        } else if ($rule <= 2) {
            $actions = array('signalements', 'annulerSignalement', 'bannir');
            if (in_array($action, $actions)) {
                self::redirectHome();
            }
        }
    }

    static function redirectConnexion()
    {
        header("Location: index.php?action=connexion&module=mod_Authentification");
    }

    static function redirectHome()
    {
        header("Location: index.php?action=Accueil&module=mod_Accueil");
    }
}

?>