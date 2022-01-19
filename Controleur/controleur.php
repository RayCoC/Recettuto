<?php

class Controleur
{
    protected $vue;
    protected $modele;

    protected function __construct($modele, $vue)
    {
        $this->modele = $modele;
        $this->vue = $vue;
    }

    public function getToken(): array
    {
        $token = ["token" => bin2hex(random_bytes(32)), "expireAt" => time() + 3600];
        $_SESSION['token'] = $token;
        return $token;
    }

    public function checkToken()
    {
        $token = $_SESSION['token'];
        if (!isset($token) or empty($token)) {
            return false;
        } else if (!isset($_POST['token']) or empty($_POST['token'])) {
            return false;
        } else {
            if ($token['token'] == $_POST['token'] and $token['expireAt'] > time()) {
                return true;
            }
            return false;
        }
    }
}