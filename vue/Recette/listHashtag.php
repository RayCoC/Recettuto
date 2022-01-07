<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/ajout.css">
    <title>Liste des ingrédients</title>
</head>
<body>
<h1>Les hashtag de votre recette</h1>
<div id="listeIng">
    <table>
        <thead>
        <tr>
            <th>Hashtag</th>
        </tr>
        </thead>
        <?php
        if (! empty($_SESSION['hashtag'])) {
            VueRecette::getHashtag();
        }
        ?>
    </table>
</div>
<form action="index.php?action=pageAjout&module=mod_Recette" method="post">
    <input type="submit" value="revenir en arriere" class="submit">
</form>