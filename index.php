<?php
require_once "Templates/header.php";
if (!isset($_GET['module'])) {
    $module = "mod_Accueil";
}
else {
    $module = $_GET['module'];
}
        include_once 'module/mod_Accueil/'.$module.".php";
        new ModAccueil();
require_once "Templates/footer.php";
?>