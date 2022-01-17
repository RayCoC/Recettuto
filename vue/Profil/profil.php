<head>
    <link rel="stylesheet" href="./CSS/profil.css">
    <link rel="stylesheet" href="./CSS/mesRecettes.css">

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

                    <a class="list-group-item " href="index.php?action=profil&module=mod_Profil&login=<?=$_SESSION['nomUtilisateur']?>" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Profile Settings</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item" id="mesRecettes" href="" login="<?=$_SESSION['nomUtilisateur']?>" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-heart mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Mes Recettes</div>
                            </div><span class="badge badge-secondary">3</span>
                        </div>
                    </a>
                    <a class="list-group-item" id="abonnements" href="" login="<?=$_SESSION['nomUtilisateur']?>">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="fe-icon-heart mr-1 text-muted"></i>
                            <div class="d-inline-block font-weight-medium text-uppercase">Abonnements</div>
                        </div><span class="badge badge-secondary">3</span>
                    </div>
                    </a>
                    <a id="commentaires" class="list-group-item" href="" login="<?=$_SESSION['nomUtilisateur']?>" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fe-icon-tag mr-1 text-muted"></i>
                                <div class="d-inline-block font-weight-medium text-uppercase">Commentaires</div>
                            </div><span class="badge badge-secondary">4</span>
                        </div>
                    </a>
                    <?php if($_SESSION['role']==3) :?>
                        <a class="list-group-item" id="signalements" href="" login="<?=$_SESSION['nomUtilisateur']?>" >
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
        <div class="col-lg-8 pb-5">
            <div id="result">
            </div>

            <form action="" method="post" class="row">
                <?php VueProfil::profilSettings($data);?>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <?php if ($_SESSION['nomUtilisateur']==$data['utilisateur']['login']):?>
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <button class="btn btn-style-1 btn-primary" id="update" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                    </div>
                    <?php endif?>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#commentaires").click(function (e) {
            e.preventDefault();
            $("#result").html("");
            $("form").html("");
            $.ajax ({
                type : "GET",
                url : "index.php?action=commentaires&module=mod_Profil",
                data : {login : $(this).attr("login")},
                success : function (data) {
                    $("#result").append(data);
                }

            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#abonnements").click(function (e) {
            e.preventDefault();
            $("#result").html("");
            $("form").html("");
            $.ajax({
            type: "GET",
            url: "index.php?action=abonnements&module=mod_Profil",
            data: {login : $(this).attr("login")},
             success : function (data) {
                $("#result").append(data);
             }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#mesRecettes").click(function (e) {
            e.preventDefault();
            $("#result").html("");
            $("form").html("");
            $.ajax({
                type: "GET",
                url: "index.php?action=mesRecettes&module=mod_Profil",
                data: {login : $(this).attr("login")},
                success : function (data) {
                    $("#result").append(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#signalements").click(function (e) {
            e.preventDefault();
            $("#result").html("");
            $("form").html("");
            $.ajax({
                type: "GET",
                url: "index.php?action=signalements&module=mod_Profil",
                data: {login : $(this).attr("login")},
                success : function (data) {
                    $("#result").append(data);
                }
            });
        });
    });
</script>
<script>

</script>
<script>
    function bannir(e) {
        $("#result").html("");
        $("form").html("");
        $.ajax({
            type: "POST",
            url: "index.php?action=bannir&module=mod_Profil",
            data: {idAvis : e},
            success : function (data) {
                $("#result").append(data);
            }
        });
    }
</script>
<script>
    function annuler(e) {
        $("#result").html("");
        $("form").html("");
        $.ajax({
            type: "POST",
            url: "index.php?action=annulerSignalement&module=mod_Profil",
            data: {idAvis : e},
            success : function (data) {
                $("#result").append(data);
            }
        });
    }
</script>
<script>
        document.getElementById("update").addEventListener("click",function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url : "index.php?action=infoModifier&module=mod_Profil",
                data : {"nom" : $("#account-ln").val(), "prenom" : $("#account-fn").val(), "sexe": $('input[name=sexe]:checked').val(), "password" : $("#account-password").val()},
            });
        });
</script>
<script>
    $(document).ready

</script>