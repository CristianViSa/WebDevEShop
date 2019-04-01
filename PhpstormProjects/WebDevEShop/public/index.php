<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01/04/2019
 * Time: 17:38
 */
    namespace Tudublin;
    require_once __DIR__ . "/../src/functions.php";
    $action = filter_input(INPUT_GET, "action");
    //If action not found, then search in POST method
    if (empty($action)){
        $action = filter_input(INPUT_POST, "action");
    }

    switch ($action){
        case "register":
            showRegisterForm();
            break;
        case "login":
            showLoginForm();
            break;
        case "processLogin":
            processLogin();
            break;
        case "processRegister":
            break;
        default:
            showHome();
 }