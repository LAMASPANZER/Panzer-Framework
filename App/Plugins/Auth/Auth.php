<?php
namespace App\Plugins\Auth;

use Panzer\Database;

class Auth extends Database
{
    private $credentials = ['user_id','csrf_token'];
    private $data = null;

    private $logged = false;

    function __construct()
    {
        if (isset($_COOKIE[$this->credentials[0]]) && isset($_COOKIE[$this->credentials[1]])) {
        	parent::__construct();

        	if ($this->data = self::$db->query("SELECT * FROM ".self::table('staffs')." WHERE id = '".$_COOKIE[$this->credentials[0]]."' AND csrf_token = '".$_COOKIE[$this->credentials[1]]."'")->fetch(\PDO::FETCH_ASSOC))
                $this->logged = true;
        }
    }

    private function hashPassword($password)
    {
        return hash('sha256', $password);
    }

    private function regeneToken()
    {
        $newtoken = sha1(uniqid(rand(), TRUE));
        self::$db->query("UPDATE ".self::Table('staffs')." SET csrf_token = '$newtoken' WHERE csrf_token ='".$this->data['csrf_token']."'");
        return $newtoken;
    }

    public function login($username, $password)
    {
        parent::__construct();

        if ($this->data = self::$db->query("SELECT id, csrf_token FROM ".self::table('staffs')." WHERE username = '$username' AND password = '".$this->hashPassword($password)."'")->fetch()) {

            setcookie($this->credentials[0], $this->data['id'],time()+3600*24*365*10,"/");
            setcookie($this->credentials[1], $this->data['csrf_token'],time()+3600*24*365*10,"/");

			return $this->logged = true;
        }
        return false;

    }

    public function logout()
    {
        $this->regeneToken();
        $this->logged = false;
        $this->data = null;
        setcookie($this->credentials[0],null,-1,"/");
        setcookie($this->credentials[1],null,-1,"/");
        return true;
    }

    public function CSRFCheck($string)
    {
        return ($this->data['csrf_token']===$string)?true:false;
    }

    public function isLogged()
    {
        return $this->logged;
    }

    public function get($string)
    {
        return $this->data[$string];
    }
}

