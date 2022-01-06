<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/nutrition.css">
    <title>Nutrition</title>
</head>

<body>

<div id=centerDiv>
    <aside>

    </aside>
    <article>
        <form action="index.php?action=connexion&module=mod_Connexion" method="post">
            <h1>Ajouter un plat</h1>

            <input type="text" id="nomPlat" name="nomPlat" placeholder="Nom plat" class="input">

            <input type="text" id="nbCalories" name="nbCalories" placeholder="Nombre de calories" class="input">
            <p>Il vous faut un compte pour utiliser la page nutrition ! cliquez <a href="index.php?action=inscription=module=mod_Connexion">ici</a> pour vous inscrire</p>
            <input type="submit" id="valider" name="valider" class="input" value="Valider">

        </form>

    </article>
</div>
</body>

</html>