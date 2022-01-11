<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/nutrition.css">
    <title>Connexion</title>
</head>
<body>
<!--<div id= centerDiv>
    <aside>
        <img src="img/connexionIMG.png">
    </aside>
    <article>
        <form action="index.php?action=login&module=mod_Authentification" method="post">
            <h1>Creer un compte</h1>
            <input type="text"  id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom d'utilisateur" class="input">
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input">
            <p>Vous n'avez pas de compte ? cliquez <a href = "index.php?action=inscription&module=mod_Authentification">ici</a> pour vous inscrire</p>
            <input type="submit" id="valider" name="login" class="input" value="Valider">
        </form>
    </article>
</div>-->
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
                        <h3 class="text-white"><?=$data['nbKcal']?> calories absorbées</h3>
                        <small class="text-white">Vous pouvez encore absorber <?=$data['nbKcalRestant']?> calories aujourd'hui</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>