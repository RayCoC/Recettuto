<?php
    if (!defined("CHECK_URL_INCLUDE")) {
        die("Interdit d'accès");

    }?>
<head>
    <link href="./CSS/footer.css" rel="stylesheet">
</head>
<footer class="text-center text-white bg-dark">
    <div class="container p-4 pb-0">
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="index.php?action=Accueil&module=mod_Accueil" role="button"
            >Accueil</a>
            <a class="btn btn-outline-light btn-floating m-1" href="index.php?action=Recette&module=mod_Recette" role="button"
            >Recette</a>
            <a class="btn btn-outline-light btn-floating m-1" href="index.php?action=listeEquipe&module=mod_Nutrition" role="button"
            >Nutrition</a>
        </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright: HAMOUCHE Rayan - LUU David - AIT HAMMA Mehdi
    </div>
</footer>
</body>
</html>