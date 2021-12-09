<?php
require_once "Templates/header.php";
session_start();
if (!isset($_GET['module'])) {
    $module = "mod_Accueil";
}
else {
    $module = $_GET['module'];
}
switch ($module) {
    case "mod_Accueil" :
        include_once 'module/'."$module".'/'.$module.".php";
            new ModAccueil();
            break;
    case "mod_Authentification" :
        include_once 'module/'."$module".'/'.$module.".php";
            new ModAuthentification();
            break;
    default :
        die ("interdiction d'acces à ce module");
        break;
}
require_once "Templates/footer.php";
?>