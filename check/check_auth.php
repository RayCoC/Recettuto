<?php
/*if (!isset($_SESSION['nomUtilisateur'])) {
    header("Location: http://localhost/index.php?action=connexion&module=mod_Authentification");
}*/

class checkAuth {
    static function can ($action, $rule = 0) {
        if ($rule == 0) {
            $actions = array('pageAjout', 'form', 'ajoutCommentaire');
            if (in_array($action, $actions)) {
                return false;
            }
            return true;
        }
        else if ($rule == 2) {
           $actions = array('listOfMembers');
            if (in_array($action, $actions)) {
                return false;
            }
            return true;
        }
    }
    static function redirect () {
        header("Location: http://localhost/index.php?action=connexion&module=mod_Authentification");
    }
}
?>