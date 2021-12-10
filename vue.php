<?php
class Vue
{
protected $module;


    public function __construct($module)
    {
       $this->module = $module;
    }

public function render($path){
        $module = "/?module=".$this->module;
        ob_start();
        include_once "./vue/$path";
        $contenu = ob_get_clean();

        include_once "./Templates/header.php";
             echo $contenu;
        include_once "./Templates/footer.php";

    }
}