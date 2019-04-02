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
        $isLoggedin = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();
        require_once __DIR__ . "/../templates/home.php";
    }

    public function showRegisterForm(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();
        require_once __DIR__ . "/../templates/registerForm.php";
    }

    public function showLoginForm(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();
        require_once __DIR__ . "/../templates/loginForm.php";
    }

    public function showAbout(){

    }
    public function processRegister(){

    }

    public function processLogin(){
        $this->username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if ($this->validLoginCredentials($this->username, $password)) {
            $this->validLoginActions();
        } else {
            $message = 'invalid login credentials - try again';
            require_once __DIR__ . '/../templates/error.php';
        }

    }

    private function validLoginActions()
    {
        $this->sessionManager->storeUsername($this->username);
        $this->showHome();
    }

    private function validLoginCredentials($username, $password)
    {
        if ($this->personnelRepository->existsPersonnel($username, $password)) {
            return true;
        }

        return false;
    }
}