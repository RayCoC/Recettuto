<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

} ?>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/connexion.css">
        <title>Connexion</title>
    </head>
    <body>

    <form action="index.php?action=login&module=mod_Authentification" method="post">
        <div class="container px-4 py-5 mx-auto">
            <div class="card card0">
                <div class="d-flex flex-lg-row flex-column-reverse">
                    <div class="card card1">
                        <div class="row justify-content-center my-auto">
                            <div class="col-md-8 col-10 my-5">
                                <div class="row justify-content-center px-3 mb-3"><img id="logo"
                                                                                       src="./img/RecettutoIMG.png">
                                </div>
                                <h3 class="mb-5 text-center heading">Connectez-vous ! </h3>
                                <div class="form-group"><label class="form-control-label text-muted">Username</label>
                                    <input type="text" id="email" name="nomUtilisateur" class="form-control"></div>
                                <div class="form-group"><label class="form-control-label text-muted">Password</label>
                                    <input type="password" id="psw" name="mdp" class="form-control"></div>
                                <input type="hidden" value="<?= $token['token'] ?>" name="token">
                                <div class="row justify-content-center my-3 px-3">
                                    <button id="valider">Login</button>
                                </div>
                            </div>
                        </div>
                        <div class="bottom text-center mb-5">
                            <a href="index.php?action=inscription&module=mod_Authentification"
                               class="sm-text mx-auto mb-3">Creer un compte</a>
                        </div>
                    </div>
                    <div class="card card2">
                        <div class="my-auto mx-md-5 px-md-5 right">
                            <h3 class="text-white">We are more than just a company</h3> <small class="text-white">Lorem
                                ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php if (!empty($data['message'])) : ?>
    <div classs="container p-5">
        <div class="row no-gutters">
            <div class="col-lg-6 col-md-4 m-auto">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Alerte : </h4>
                    <p><?= $data['message'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>