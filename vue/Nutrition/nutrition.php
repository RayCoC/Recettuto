<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/nutrition.css">
    <title>Nutrition</title>
</head>
<body>

<form action="index.php?action=ajoutPlat&module=mod_Nutrition" method="post">
    <div class="container px-4 py-5 mx-auto">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card1">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-10 my-5">
                            <div class="row justify-content-center px-3 mb-3"> <img id="logo" src="./img/RecettutoIMG.png"> </div>
                            <h3 class="mb-5 text-center heading">Ajouter un plat</h3>
                            <div class="form-group"> <label class="form-control-label text-muted">Nom plat</label> <input type="text" id="nomPlat" name="nomPlat" class="form-control"> </div>
                            <div class="form-group"> <label class="form-control-label text-muted">Nombre de calories</label> <input type="text" id="nbCalories" name="nbCalories" class="form-control"> </div>
                            <div class="row justify-content-center my-3 px-3"> <button id="valider">Valider</button> </div>
                        </div>
                    </div>
                    <div class="bottom text-center mb-5">
                        <p>Il vous faut un compte pour utiliser la page nutrition ! cliquez <a href="index.php?action=inscription&module=mod_Authentification" class="sm-text mx-auto mb-3">ici</a> pour vous inscrire</p>
                    </div>
                </div>
                <div class="card card2">
                    <div class="my-auto mx-md-5 px-md-5 right">
                        <h3 class="text-white">Aujourd'hui</h3>
                        <?php if ($data['nbKcal']>0) :?>
                            <h3 class="text-white"><?=$data['nbKcal']?> calories absorbées</h3>
                        <?php else:?>
                            <h3 class="text-white">Vous n'avez pas consommés de plat</h3>
                        <?php endif ?>
                        <?php if ($data['nbKcalRestant']>0) :?>
                            <p class="text-white">Vous pouvez encore absorber <?=$data['nbKcalRestant']?> calories aujourd'hui</p>
                        <?php else:?>
                            <p class="text-white">Vous etes à <?=abs($data['nbKcalRestant'])?> calories en trop aujourd'hui</p>
                        <?php endif ?>
                        <p class="text-white">Pour acceder à votre recapitulatif cliquez <a href="index.php?action=recapitulatif&module=mod_Nutrition" class="text-white">ici</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>