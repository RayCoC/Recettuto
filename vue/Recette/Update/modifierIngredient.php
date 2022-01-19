<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

}?>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="./CSS/ajout.css">
            <title>Formulaire modification ingrédient</title>
        </head>

        <body>
            <form action="index.php?action=formModifieIngredient&module=mod_Recette" method="post">
                <div>
                    <input type="text" name="newNomIngredient" class="info" placeholder="Ingredient">
                    <input type="text" name="newQuantite" id="quantite" class="info" placeholder="quantite">
                    <input type="text" name="newUnite" id="unite" class="info" placeholder="unite">
                    <input type="hidden" value="<?=$token['token']?>" name="token">
                    <input type="submit" value="valider" class="submit" name="confirmIngredient"><br><br>
                </div>
            </form>
        </body>