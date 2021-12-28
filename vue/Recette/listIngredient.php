<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="./CSS/ajout.css">
            <title>Liste des ingrédients</title>
        </head>
        <body>
            <h1>Liste des ingrédient de votre recette</h1>
            <div id="listeIng">
                <table>
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Quantite</th>
                        <th>Unite</th>
                    </tr>
                    </thead>
                    <?php
                    if (!empty($_SESSION['ingredient'])) {
                        VueRecette::getIngredients();
                    }
                    ?>
                </table>
            </div>
                <form action="index.php?action=pageAjout&module=mod_Recette" method="post">
                    <input type="submit" value="revenir en arriere" class="submit">
                </form>