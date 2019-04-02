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
    public function __construct()
    {
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