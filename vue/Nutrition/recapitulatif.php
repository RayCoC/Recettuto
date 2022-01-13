<?php include_once "./vue/vue_Nutrition.php";?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/recapitulatif.css">
    <title>Recapitulatif</title>
</head>

<div class="container">
    <div class="row">
        <?php VueNutrition::affichePlat($data['plat']);?>
    </div>
</div>
