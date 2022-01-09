<?php
include_once "Connexion.php";
include_once "./check/check_auth.php";
session_start();

if (!isset($_SESSION['nomUtilisateur'])) {
    if (!checkAuth::can($_GET['action'])) {
        checkAuth::redirect();
    }
}
Connexion::initConnexion();
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
    case "mod_Recette" :
        include_once 'module/'."$module".'/'.$module.".php";
        new ModRecette();
        break;
    case "mod_Profil":
        include_once 'module/'."$module".'/'.$module.".php";
        new ModProfil();
        break;
    default :
        die ("interdiction d'acces à ce module");
        break;
}
?>

