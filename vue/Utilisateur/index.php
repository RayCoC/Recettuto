<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

} ?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            $("#result").html('');
            var user = $(this).val();
            if (user != "") {
                $.ajax({
                    url: "index.php?action=search&user=" + encodeURIComponent() + "&module=mod_Utilisateur",
                    type: 'POST',
                    data: {"user": encodeURIComponent(user)},
                    success: function (data) {
                        if (data != "") {
                            $("#result").append(data);
                        }
                    }
                });
            }
        });
    });
</script>

<body>
<div class="container">
    <br/>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search"
                               placeholder="Recherchez un utilisateur" id="search">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="result">

</div>