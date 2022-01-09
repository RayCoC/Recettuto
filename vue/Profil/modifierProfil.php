
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/inscription.css">
    <title>Inscription</title>
</head>
<body>
<!--<div id= centerDiv>
    <article>
        <form action="index.php?action=inscriptionBD&module=mod_Authentification" method="post">
            <h1>S'inscrire</h1>

            <input type="radio" id="homme" name="sexe" value="homme">
            <label for="homme">Homme</label>
            <input type="radio" id="femme" name="sexe" value="femme">
            <label for="femme">Femme</label>
            <?php if(!isset($_POST["sexe"])){ echo "<p id='sexe' class='error'>Sexe n'est pas selectionner</p>";}?>

            <input type="number" id="number" name="age" placeholder="Age" value="<?php if(isset($_POST['age'])){ echo  $_POST['age'];}?>" class="input">
            <?php if(!isset($_POST["age"])){ echo "<p class='error'>Age n'est pas rempli</p>";}?>

            <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php if(isset($_POST['nom'])){ echo  $_POST['nom'];}?>" class="input">
            <?php if(!isset($_POST["nom"])){ echo "<p class='error'>Nom n'est pas rempli</p>";}?>

            <input type="text" id="prenom" name="prenom" placeholder="Prenom" value="<?php if(isset($_POST['prenom'])){ echo  $_POST['prenom'];}?>" class="input">
            <?php if(!isset($_POST["prenom"])){ echo "<p class='error'>Prenom n'est pas rempli</p>";}?>

            <input type="text"  id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom d'utilisateur" value="<?php if(isset($_POST['nomUtilisateur'])){ echo  $_POST['nomUtilisateur'];}?>" class="input">
            <?php if(!isset($_POST["nomUtilisateur"])){ echo "<p class='error'>Nom d'utilisateur n'est pas rempli</p>";}?>

            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input">
            <?php if(!isset($_POST["mdp"])){ echo "<p class='error'>Mot de passe n'est pas rempli</p>";}?>


            <input type="submit" id="valider" name="valider"class="input" value="Valider" >

        </form>
    </article>
    <aside>
        <img src="img/inscription.jpg">
    </aside>
</div>-->
<section>
    <form action="index.php?action=infoModifier&module=mod_Profil" method="post">
        <div class="container py-5 h-50">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-3">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="./img/inscription.jpg" class="img-fluid"/>
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">Modification</h3>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label">Nom</label>
                                                <input type="text" class="form-control form-control-lg" name="nom"/>

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label class="form-label" for="form3Example1n">Prenom</label>
                                                <input type="text" class="form-control form-control-lg" name="prenom"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example8">Age</label>
                                        <input type="text" class="form-control form-control-lg" name="age"/>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example8">Nom d'utilisateur</label>
                                        <input type="text" class="form-control form-control-lg" name="nomUtilisateur"/>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example8">Mot de passe</label>
                                        <input type="text" class="form-control form-control-lg" name="mdp"/>

                                    </div>
                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                        <h6 class="mb-0 me-4">Gender: </h6>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input type="radio" id="homme" name="sexe" value="homme">
                                            <label for="homme">Homme</label>
                                            <input type="radio" id="femme" name="sexe" value="femme">
                                            <label for="femme">Femme</label>

                                        </div>
                                </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <input type="submit" class="btn btn-lg ms-2" id="valider" value="Submit" name="valider">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>