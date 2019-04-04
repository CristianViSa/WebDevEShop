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
    private $smartphoneRepository;
    private $sessionManager;
    private $username;

    public function __construct()
    {
        $this->personnelRepository = new PersonnelRepository();
        $this->smartphoneRepository = new SmartphoneRepository();
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
    public function showStore(){

        $isLoggedin = $this->sessionManager->isLoggedIn();
        $username = $this->sessionManager->usernameFromSession();
        $smartphones = $this->smartphoneRepository->getAll();
        $usertype = $this->sessionManager->userTypeFromSession();
        require_once __DIR__ . "/../templates/smartphonesStore.php";
    }
    public function showAbout(){

    }
    public function processRegister(){
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email');
        $telephone = filter_input(INPUT_POST, 'telephone');
        $userType = 'user';

        $personnel = new Personnel();
        $personnel->setUsername($username);
        $personnel->setPassword($password);
        $personnel->setEmail($email);
        $personnel->setTelephone($telephone);
        $personnel->setUsertype($userType);

        $id = $this->personnelRepository->create($personnel);

        if($id > -1){
            $message = "User $username, $password has been registered";
            require_once __DIR__ . '/../templates/message.php';
        } else {
            $message = "error creating new user";
            require_once __DIR__ . '/../templates/error.php';

        }

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
        $type = $this->personnelRepository->typeOfPersonnel($this->username);
        $this->sessionManager->storeUserType($type);
        $this->showHome();
    }

    private function validLoginCredentials($username, $password)
    {
        if ($this->personnelRepository->existsPersonnel($username, $password)) {
            return true;
        }

        return false;
    }

    public function buyPhone($id){
        if($this->smartphoneRepository->buyPhone($id)){
            $message = "Your shop has been processed";
            require_once __DIR__ . '/../templates/message.php';
        }
        else{
            $message = "Sorry, there was a problem with your shop.";
            require_once __DIR__ . '/../templates/message.php';
        }
    }
}