<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01/04/2019
 * Time: 17:38
 */
    namespace Tudublin;
    require_once __DIR__ . "/../src/functions.php";
    $action = filter_input(INPUT_POST, "action");

    switch ($action){

        default:
            showHome();
 }