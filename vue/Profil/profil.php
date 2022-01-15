<head>
    <link rel="stylesheet" href="./CSS/profil.css">

</head>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(./img/fruitveg.jpeg);"></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="./img/profil.png">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg"><?=$data['utilisateur']['login']?></h5><span class="author-card-position">Joined <?=$data['utilisateur']['date']?></span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">

                    <a class="list-group-item active" href="index.php?action=profil&module=mod_Profil&login=<?=$_SESSION['nomUtilisateur']?>" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Profile Settings</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item" href="index.php?action=mesRecettes&module=mod_Profil&login=<?=$_SESSION['nomUtilisateur']?>" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Mes Recettes</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item" href="index.php?action=abonnements&module=mod_Profil&login=<?=$_SESSION['nomUtilisateur']?>" ">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="fe-icon-heart mr-1 text-muted"></i>
                            <div class="d-inline-block font-weight-medium text-uppercase">Abonnements</div>
                        </div><span class="badge badge-secondary">3</span>
                    </div>
                    </a>
                    <a class="list-group-item" href="index.php?action=commentaires&module=mod_Profil&login=<?=$_SESSION['nomUtilisateur']?>" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Commentaires</div>
                            </div><span class="badge badge-secondary">4</span>
                        </div>
                    </a>
                    <?php if(ModeleProfil::estAdmin()) :?>
                        <a class="list-group-item" href="index.php?action=signalements&module=mod_Profil&login=<?=$_SESSION['nomUtilisateur']?>" >
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Signalements</div>
                                </div><span class="badge badge-secondary">3</span>
                            </div>
                        </a>
                    <?php endif;?>
                </nav>
            </div>
        </div>
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
            <form action="index.php?action=infoModifier&module=mod_Profil" method="post" class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">First Name</label>
                        <input class="form-control" type="text" id="account-fn" value="<?=$data['utilisateur']['prenom']?>"  name="prenom" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Last Name</label>
                        <input class="form-control" type="text" id="account-ln" value="<?=$data['utilisateur']['nom']?>" name="nom">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-password">Mot de passe</label>
                        <input class="form-control" type="password" id="account-password" value="" name="password" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Age</label>
                        <input class="form-control" type="number" id="account-email" value="<?=$data['utilisateur']['age']?>" name="age" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Sexe</label>
                        <div class="form-check form-check-inline mb-0 me-4">
                            <input type="radio" id="homme" name="sexe" value="homme" checked>
                            <label for="homme">Homme</label>
                            <input type="radio" id="femme" name="sexe" value="femme">
                            <label for="femme">Femme</label>
                        </div>
                    </div>
                </div>



                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">

                        <button class="btn btn-style-1 btn-primary" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>