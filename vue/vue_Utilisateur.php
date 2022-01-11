<?php
include_once "vue.php";
class VueUtilisateur extends Vue{
    function PageAccueilUtilisateur() {
        vue::render("Utilisateur/index.php");
    }
    function afficheUtilisateur($data) {
        if (!empty($data)) {
            foreach ($data as $item => $value) {
                echo '
                <section class="pb-10 header text-center">
                    <div class="container py-10 text-white">
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                             <div class="card border-0 shadow">
                            <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Pseudo</th>
                                   </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">'.$value[1].'</th>
                                            <th scope="row">'.$value[2].'</th>
                                            <th scope="row">'.$value[6].'</th>
                                                <td>
                                                    <ul class="list-inline m-0">
                                                        <li class="list-inline-item">
                                                            <a href="index.php?action=voirProfil&id='.$value[0].'&module=mod_Profil">Voir profil</a>
                                                        </li>';
                                                        if ($_SESSION['role'] == 3 && $value[7] == 2) { echo '
                                                        <li class="list-inline-item">
                                                              <!--<button value='.$value[0].' id="ban" onclick="ban()">Bannir</button> Pour ajax--> 
                                                              <a href="index.php?action=bannir&idUser='.$value[0].'&module=mod_Utilisateur">Bannir</a>
                                                        </li>';
                                                        }
                                                        else if ($value[7] == 1) {
                                                            echo '<li class="list-inline-item">
                                                              <a>Utilisateur banni</a>
                                                        </li>';
                                                        }
                                                    echo '</ul>
                                                 </td>
                                            </tr>
                                    </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>
                            </section>';
            }
        }
    }
}