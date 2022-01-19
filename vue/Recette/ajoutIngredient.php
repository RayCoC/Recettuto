<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

}?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/ajoutIngredient.css">
        <title>Liste des ingrédients</title>
    </head>
    <body>
    <form action="index.php?action=successAjoutIngredient&module=mod_Recette" method="post">
        <div id="ajout">
            <label>Nom de l'ingrédient</label>
            <input type="text" name="nomIngredient">
            <label>Quantité</label>
            <input type="text" name="quantite">
            <label>Unité</label>
            <input type="text" name="unite">
        </div>
        <input type="submit" name="Valider" value="ajouter">
        </form>