<?php

class Connexion {
	protected static $bdd = NULL;
    public function __construct() {
    }

    public static function initConnexion() {
        // $dns="mysql:host=localhost;dbname=dutinfopw201641";
        // $user="root";
        // $password='';
        // self::$bdd = new PDO($dns,$user,$password);	
        
        $dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201641";
        $user="dutinfopw201641";
        $password="teraqagu";
        self::$bdd = new PDO($dns,$user,$password);	
    }
}
?>