<?php
require_once "Templates/header.php";


session_start();
if (!isset($_GET['module'])) {
    $module = "mod_Accueil";
}
else {
    $module = $_GET['module'];
}
include_once 'module/'.$module."/index.php";
require_once "Templates/footer.php";
?>