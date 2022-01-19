<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

} ?>
<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
            <br><br>
            <h2 style="color:#0fad00">Success</h2>
            <img src="./img/succes.png">
            <p style="font-size:20px;color:#5C5C5C;">Merci, votre recette a bien été ajouté sur le site !</p>
            <a href="index.php?action=Accueil&module=mod_Accueil" class="btn btn-success">Revenir à la page
                d'accueil</a>
            <br><br>
        </div>

    </div>
</div>
