
<head>
    <link rel="stylesheet" href="CSS/profil.css">
    <title>Recettuto Profil</title>
</head>
<body>
<div class="container">
    <div class "main">
    <div class="topbar">
        <a href="">Abonnement  </a>
        <a href="">Commentaires </a>
        <a href="">Mes recettes  </a>

    </div>
    <div class="row">
        <div class="col-md-4 mt-1">
            <div class="card text-center sidebar">
                <div class="card-body">
                    <img src="img/profil.png" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <h3><?=$data['utilisateur']['login']?></h3>

                        <p><?=$data['utilisateur']['date']?></p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-1">
            <div class="card mb-3 content">
                <h1 class="m-3 pt-3">Mes informations</h1>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Prénom</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <p><?=$data['utilisateur']['prenom']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Nom</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <p><?=$data['utilisateur']['nom']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Sexe</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <p><?=$data['utilisateur']['sexe']?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Age</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <p><?=$data['utilisateur']['age']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 content">
                <h1 class="m-3">Gestion compte</h1>
                <div class="card_body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Modifier informations</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <button class="btn btn-secondary btn-lg" type="button"><a id="bouton" href="index.php?module=mod_Profil&action=modifProfil" >Cliquer ici</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>