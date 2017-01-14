<?php
namespace App\Libraries;

use App\User;
use Crypt;

class Auth
{
    private static $instance;

    private $sessionKey = 'user';

    private $userInfo = false;

    private $request;

    private function __construct()
    {
        $this->request = App('Illuminate\Http\Request');
    }

    public static function create()
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function login($userInfo)
    {
        $username = $userInfo['username'];
        $password = $userInfo['password'];

        $user = User::where('username', '=', $username)->first();

        if (! empty($user) && Crypt::decrypt($user->password) == $password) {
            $this->userInfo = $userInfo;
            $this->request->session()->put($this->sessionKey, $this->userInfo);
        }

        return $this;
    }

    public function logout()
    {
        $this->userInfo = false;
        $this->request->session()->forget($this->sessionKey);

        return $this;
    }

    public function isAuthed()
    {
        return $this->request->session()->has($this->sessionKey);
    }

    public function getUserInfo($prop = false)
    {
        $userInfo = $this->request->session()->get($this->sessionKey);
        if (! $prop) {
            return $userInfo;
        }

        if (isset($userInfo[$prop])) {
            return $userInfo[$prop];
        }

        return false;
    }
}
