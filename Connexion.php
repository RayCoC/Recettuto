<?php

class Connexion {
	protected static $bdd = NULL;
    public function __construct() {
    }

    public static function initConnexion() {

        /*$dns="mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201641";*/
        $dns="mysql:host=localhost;dbname=dutinfopw201641";
        $user="root";
        /*$password="teraqagu";*/
        $password = '';
        self::$bdd = new PDO($dns,$user,$password);

        }
}
?>