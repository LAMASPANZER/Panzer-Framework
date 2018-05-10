<?php
namespace App\Plugins\Auth;

use Panzer\Database;

class Auth extends Database
{
    private $cookiesession = 'auth_token';
    private $token = null;
    public $data = null;
    private $logged = false;

    function __construct()
    {
        parent::__construct();

        if (isset($_COOKIE[$this->cookiesession])) {
            $this->token = $_COOKIE[$this->cookiesession];
            if ($this->GetData($this->token))
                $this->logged = true;
        }
    }

    public function IsLogged()
    {
        return $this->logged;
    }

    public function CryptPassword($password)
    {
        return hash('sha256', $password);
    }

    public function NewToken()
    {
        return md5(uniqid(rand(), TRUE));
    }

    public function RegeneToken()
    {
        $newtoken = $this->NewToken();
        self::$db->query("UPDATE ".self::Table('staffs')." SET token = '$newtoken' WHERE token ='$this->token'");
        return $this->token = $newtoken;
    }

    public function Login($username, $password)
    {
        if ($this->token = self::$db->query("SELECT token FROM ".self::Table('staffs')." WHERE username = '$username' AND password = '$password'")->fetchColumn()) {
            $this->logged = true;

            setcookie($this->cookiesession, $this->token,time()+3600*24*365*10,"/");

            if ($this->GetData($this->token)) {
                $this->logged = true;
                return true;
            }

        } else
            return false;
    }

    public function Logout()
    {
        $this->RegeneToken();
        $this->token = null;
        $this->logged = false;
        $this->data = null;
        setcookie($this->cookiesession,null,-1,"/");
        return true;
    }

    private function GetData()
    {
        return $this->data = self::$db->query("SELECT * FROM ".self::Table('staffs')." WHERE token = '$this->token'")->fetch(\PDO::FETCH_ASSOC);
    }

    public function IsSuperAdmin()
    {
        return $this->data['superadmin'];
    }

    public function IsOwner($int)
    {
        return ($this->data['id'] == $int)?true:false;
    }

    public function IsRestricted()
    {
        return $this->data['restricted'];
    }

    public function SetSuperAdmin($name, $bool)
    {
        return self::$db->query("UPDATE ".self::Table('staffs')." SET superadmin = '$bool' WHERE token ='$this->token'");
    }

    public function CSRF_Check($string)
    {
        return ($this->GetToken()===$string)?true:false;
    }

    public function GetToken()
    {
        return $this->data['token'];
    }
}

