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
        case "buy":
            $id = filter_input(INPUT_GET, "id");
            $mainController->buyPhone($id);
            break;
        default:
            $mainController->showHome();
 }