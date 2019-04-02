<?php
/**
 * Created by PhpStorm.
 * Personnel: user
 * Date: 02/04/2019
 * Time: 11:49
 */

namespace Tudublin;

class MainController
{
    private $personnelRepository;
    private $sessionManager;
    private $username;

    public function __construct()
    {
        $this->personnelRepository = new PersonnelRepository();
        $this->sessionManager = new SessionManager();
    }

    public function showHome(){
        require_once __DIR__ . "/../templates/home.php";
    }

    public function showRegisterForm(){
        require_once __DIR__ . "/../templates/registerForm.php";
    }

    public function showLoginForm(){
        require_once __DIR__ . "/../templates/loginForm.php";
    }

    public function showAbout(){

    }
    public function processRegister(){

    }

    public function processLogin(){

    }
}