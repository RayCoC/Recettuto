<?php include_once "./vue/vue_Profil.php";?>

<head>
    <link rel="stylesheet" href="./CSS/mesRecettes.css">

</head>
<div class="container mb-4">
    <div class="row">
        <div class="col-lg-4 pb-5">
            <!-- Account Sidebar-->
            <div class="author-card pb-3">
                <div class="author-card-cover" style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"></div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" >
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg"><?= $_SESSION['nomUtilisateur']?></h5><span class="author-card-position">Joined <?=$data['utilisateur']['date']?></span>
                    </div>
                </div>
            </div>
            <div class="wizard">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item " href="index.php?action=profil&module=mod_Profil" >
                        <i class="fa fa-user text-muted"></i>Profile Settings</a>
                    <a class="list-group-item  " href="index.php?action=mesRecettes&module=mod_Profil" >
                        <i class="fa fa-user text-muted"></i>Mes Recettes</a>
                    <a class="list-group-item " href="index.php?action=abonnements&module=mod_Profil" >
                        <i class="fa fa-user text-muted"></i>Abonnements</a>
                    <a class="list-group-item active" href="index.php?action=commentaires&module=mod_Profil" >
                        <i class="fa fa-user text-muted"></i>Commentaires</a>
                </nav>
            </div>
        </div>
        <!-- Wishlist-->
        <div class="col-lg-8 pb-5">
            <!-- Item-->

            <?php VueProfil::afficheCommentaires($data['commentaires']);?>
        </div>
    </div>
</div>
