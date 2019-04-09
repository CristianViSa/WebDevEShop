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
    public function getUsertype(){
        return $this->sessionManager->userTypeFromSession();
    }
    public function showHome(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        require_once __DIR__ . "/../templates/home.php";
    }

    public function showRegisterForm(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        require_once __DIR__ . "/../templates/registerForm.php";
    }

    public function showLoginForm(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        require_once __DIR__ . "/../templates/loginForm.php";
    }
    public function showStore(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        $smartphones = $this->smartphoneRepository->getAll();
        require_once __DIR__ . "/../templates/smartphonesStore.php";
    }

    public function showUsers(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin and $this->sessionManager->userTypeFromSession()== 'admin') {
            $personell = $this->personnelRepository->getAll();
            require_once __DIR__ . "/../templates/manageUsers.php";
        }
        else{
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . "/../templates/message.php";
            }
    }

    public function showAbout(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        require_once __DIR__ . "/../templates/about.php";

    }

    public function showDetails($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin) {
            $smartphone = $this->smartphoneRepository->getOneById($id);
            require_once __DIR__ . "/../templates/smartphoneDetails.php";
        }else {
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }

    }
    public function showNewSmartphoneForm()
    {
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if ($isLoggedin and $this->sessionManager->userTypeFromSession() != 'user'){
            require_once __DIR__ . "/../templates/addSmartphoneForm.php";
        }else {
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function showNewStaffForm(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if ($isLoggedin and $this->sessionManager->userTypeFromSession() == 'admin') {
            require_once __DIR__ . "/../templates/addStaffForm.php";
        }else {
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }

    }

    public function updateSmartphone($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin and $this->sessionManager->userTypeFromSession()!= 'user') {
            $smartphones = $this->smartphoneRepository->getAll();
            require_once __DIR__ . "/../templates/updateSmartphoneForm.php";
        }
        else{
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function updatePersonnel($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin and $this->sessionManager->userTypeFromSession() == 'admin') {
            require_once __DIR__ . "/../templates/updatePersonnelForm.php";
        }
        else{
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . "/../templates/message.php";
        }
    }

    public function deleteUser($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin and $this->sessionManager->userTypeFromSession()== 'admin'){
            if($this->personnelRepository->delete($id)) {
                $message = "The user with id ($id) has been Deleted";
                require_once __DIR__ . '/../templates/message.php';
            }else {
                $message = "There were some problems deleting the user";
            }
        }
    }

    public function processUpdateStock($id)
    {
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if ($isLoggedin and $this->sessionManager->userTypeFromSession()!= 'user'){
            $stock = filter_input(INPUT_POST, 'stock');
            if ($this->smartphoneRepository->updateStore($id, $stock)) {
                $message = "The phone with id ($id) stock has been updated";
            } else {
                $message = "There were some problems updating the stock";
            }
            require_once __DIR__ . '/../templates/message.php';
        }else{
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function processUpdateUsertype($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin) {
            $newUsertype = filter_input(INPUT_POST, 'userType');
            if ($this->personnelRepository->updateUsertype($id, $newUsertype)) {
                $message = "The user with id ($id) type has been updated";
            } else {
                $message = "Sorry, there were some problems updating the usertype";
            }
            require_once __DIR__ . '/../templates/message.php';
        }else{
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }
    }
    public function processUpdatePrice($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin and $this->sessionManager->userTypeFromSession()!= 'user') {
            $price = filter_input(INPUT_POST, 'price');
            if ($this->smartphoneRepository->updatePrice($id, $price)) {
                $message = "The phone with id ($id) price has been updated";
            } else {
                $message = "Sorry, there were some problems updating the price";
            }
            require_once __DIR__ . '/../templates/message.php';
        }
        else{
            $message = "Sorry, you need special privileges to do this";
            require_once __DIR__ . '/../templates/message.php';
        }
    }
    public function processRegister(){
        $isLoggedin = $this->sessionManager->isLoggedIn();

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
        $isLoggedin = $this->sessionManager->isLoggedIn();

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
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin) {
            if ($this->smartphoneRepository->buyPhone($id)) {
                $message = "Your shop has been processed";

            } else {
                $message = "Sorry, there was a problem with your shop.";
            }
            require_once __DIR__ . '/../templates/message.php';
        }
        else{
            $message = "Sorry, you need to be loged in to buy a phone";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function deleteSmartphone($id){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if($isLoggedin and $this->sessionManager->userTypeFromSession()!= 'user') {
            if ($this->smartphoneRepository->delete($id)) {
                $message = "Smartphone with id ($id) has been deleted";
            } else {
                $message = "Sorry, there was a problem with the delete.";
            }
            require_once __DIR__ . '/../templates/message.php';
        }
        else{
            $message = "Sorry, you need to be loged in to buy a phone";
            require_once __DIR__ . '/../templates/message.php';
        }
    }

    public function addSmartphone(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if ($isLoggedin and $this->sessionManager->userTypeFromSession()!= 'user') {
            $name = filter_input(INPUT_POST, 'name');
            $stock = filter_input(INPUT_POST, 'store');
            $price = filter_input(INPUT_POST, 'price');
            $photo = filter_input(INPUT_POST, 'photo');

            $smartphone = new Smartphone();
            $smartphone->setName($name);
            $smartphone->setStore($stock);
            $smartphone->setPrice($price);
            $smartphone->setPhoto($photo);

            $id = $this->smartphoneRepository->create($smartphone);
            if ($id > -1) {
                $message = "Smartphone $name , has been registered";
                require_once __DIR__ . '/../templates/message.php';
            } else {
                $message = "error creating new smartphone";
                require_once __DIR__ . '/../templates/error.php';

            }
        }else{
            $message = "Sorry, you need to be loged in to buy a phone";
            require_once __DIR__ . '/../templates/message.php';
        }

    }

    public function addStaff(){
        $isLoggedin = $this->sessionManager->isLoggedIn();
        if ($isLoggedin and $this->sessionManager->userTypeFromSession()== 'admin') {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            $email = filter_input(INPUT_POST, 'email');
            $telephone = filter_input(INPUT_POST, 'telephone');
            $userType = 'staff';

            $personnel = new Personnel();
            $personnel->setUsername($username);
            $personnel->setPassword($password);
            $personnel->setEmail($email);
            $personnel->setTelephone($telephone);
            $personnel->setUsertype($userType);

            $id = $this->personnelRepository->create($personnel);
            if ($id > -1) {
                $message = "User $username, $password has been registered";
                require_once __DIR__ . '/../templates/message.php';
            } else {
                $message = "error creating new user";
                require_once __DIR__ . '/../templates/error.php';

            }
        }else{
            $message = "Sorry, you need to be loged in to buy a phone";
            require_once __DIR__ . '/../templates/message.php';
        }

    }
}