<?php
class Controleur {

    public function getToken():array {
        $token = ["token"=>bin2hex(random_bytes(32)),"expireAt"=>time()+3600];
        /*$_SESSION['tokens'][] = $token;*/
        $_SESSION['token'] = $token;
        return $token;
    }
    public function checkToken() {
        $token = $_SESSION['token'];
        if (!isset($token) or empty($token)) {
            return false;
        }
        else if (!isset($_POST['token']) or empty($_POST['token'])) {
            return false;
        }
        else {
            if ($token['token'] == $_POST['token'] and $token['expireAt']>time()) {
                return true;
            }
            return false;
        }
    }
        /*
        else {
           foreach($tokens as  $token){
               if($token["token"]==$_POST['token'] and $token['expireAt']>time()){
                   return true;
                
               } else{
                   return false;
               }
           } 
        }
    }
        */
}