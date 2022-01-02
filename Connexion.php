<?php

class Connexion {
	protected static $bdd = NULL;
    public function __construct() {
    }

    public static function initConnexion() {
        $dns="mysql:host=localhost;dbname=dutinfopw201641";
        $user="root";
        $password='';
        self::$bdd = new PDO($dns,$user,$password);	
        }
}
?>