<?php
/**
 * Created by PhpStorm.
 * Personnel: user
 * Date: 01/04/2019
 * Time: 17:38
 */
    session_start();

    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . "/../db/db.php";
    use Tudublin\MainController;

    $mainController = new MainController;
    $action = filter_input(INPUT_GET, "action");
    //If action not found, then search in POST method
    if (empty($action)){
        $action = filter_input(INPUT_POST, "action");
    }

    switch ($action){
        case "register":
            $mainController->showRegisterForm();
            break;
        case "login":
            $mainController->showLoginForm();
            break;
        case 'logout':
            unset($_SESSION['username']);
            unset($_SESSION['userType']);
            $mainController->showHome();
            break;
        case "about":
            $mainController->showAbout();
            break;
        case "store":
            $mainController->showStore();
            break;
        case "processLogin":
            $mainController->processLogin();
            break;
        case "processRegister":
            $mainController->processRegister();
            break;
        case "updateSmartphone":
            $id = filter_input(INPUT_GET, "id");
            $mainController->updateSmartphone($id);
            break;
        case "processUpdateStock":
            $id = filter_input(INPUT_POST, "id");
            $mainController->processUpdateStock($id);
            break;
        case "processUpdatePrice":
            $id = filter_input(INPUT_POST, "id");
            $mainController->processUpdatePrice($id);
            break;
        case "details":
            $id = filter_input(INPUT_GET, "id");
            $mainController->showDetails($id);
            break;
        case "buy":
            $id = filter_input(INPUT_GET, "id");
            $mainController->buyPhone($id);
            break;
        case "deleteSmartphone":
            $id = filter_input(INPUT_GET, "id");
            $mainController->deleteSmartphone($id);
            break;
        case "manageUsers":
            $mainController->showUsers();
            break;
        case "deleteUser":
            $id = filter_input(INPUT_GET, "id");
            $mainController->deleteUser($id);
            break;
        case "updatePersonnel":
            $id = filter_input(INPUT_GET, "id");
            $mainController->updatePersonnel($id);
            break;
        case "processUpdateUsertype":
            $id = filter_input(INPUT_POST, "id");
            $mainController->processUpdateUsertype($id);
            break;
        case "addSmartphone":
            $mainController->showNewSmartphoneForm();
            break;
        case "processAddSmartphone":
            $mainController->addSmartphone();
            break;
        case "addStaff":
            $mainController->showNewStaffForm();
            break;
        case "processAddStaff":
            $mainController->addStaff();
            break;
        default:
            $mainController->showHome();
 }