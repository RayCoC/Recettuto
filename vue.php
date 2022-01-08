<?php
class Vue
{

public static function render($path, $data=[], $token=null){
        ob_start();
        include_once "./vue/$path";
        $contenu = ob_get_clean();

        include_once "./Templates/header.php";
             echo $contenu;
        include_once "./Templates/footer.php";

    }
}