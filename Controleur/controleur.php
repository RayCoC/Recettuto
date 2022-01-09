<?php
class Controleur {

    public function getToken() {
        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        $_SESSION['token-expire'] = time()+3600;
        return $token;
    }
}