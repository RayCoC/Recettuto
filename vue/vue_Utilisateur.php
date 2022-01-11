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
                                        <th scope="col">Quantite</th>
                                        <th scope="col">Unite</th>
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
                                                            <a href="index.php?action=modifierIngredient&ingredient='.$value[6].'&module=mod_Recette"><i class="fa fa-edit"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                              <a href="index.php?action=supprimerIngredient&ingredient='.$value[6].'&module=mod_Recette"><i class="fa fa-trash"></i></a>
                                                        </li>
                                                    </ul>
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