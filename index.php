<?php
include_once "Connexion.php";
include_once "./vue.php";
include_once "./check/check_auth.php";

define("CHECK_URL_INCLUDE", NULL);
session_start();
if (isset($_GET['action'])) {
    if (isset($_SESSION['nomUtilisateur'])) {
        checkAuth::can($_GET['action'], $_SESSION['role']);
    }
    else {
        checkAuth::can($_GET['action']);
    }
}
if (!isset($_SESSION['hashtag'])) {
    $_SESSION['hashtag'] = array();
}
if (!isset($_SESSION['ingredient'])) {
    $_SESSION['ingredient'] = array();
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
    case "mod_Utilisateur" :
        include_once 'module/'."$module".'/'.$module.".php";
        new ModUtilisateur();
        break;
    case "mod_Nutrition" :
        include_once 'module/'."$module".'/'.$module.".php";
        new ModNutrition();
        break;
    default :
            Vue::render("/ErrorPage/404.php");
        break;
}
?>

