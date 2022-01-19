<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

} ?>
<?php include_once "./vue/vue_Nutrition.php"; ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/recapitulatif.css">
    <title>Recapitulatif</title>
</head>

<div class="container">
    <div class="row" id="result">
        <?php VueNutrition::affichePlat($data['plat']); ?>
    </div>
</div>

<script>
    function retirer(e) {
        $("#result").html("");
        $.ajax({
            type: "POST",
            url: "index.php?action=retirer&module=mod_Nutrition",
            data: {'idNutrition': e},
            success: function (data) {
                $("#result").append(data);
            }
        });
    }
</script>