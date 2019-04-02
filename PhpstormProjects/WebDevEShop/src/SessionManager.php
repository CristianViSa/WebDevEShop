<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/04/2019
 * Time: 16:06
 */

namespace Tudublin;


class SessionManager
{
    public function isLoggedIn()
    {
        if(isset($_SESSION['username'])){
            return true;
        } else {
            return false;
        }

//        return isset($_SESSION['username']);
    }

    public function storeUsername($username)
    {
        $_SESSION['username'] = $username;
    }

    /**
     * return string - username if in session
     * else return FALSE
     */
    public function usernameFromSession()
    {
        if(isset($_SESSION['username'])){
            return $_SESSION['username'];
        } else {
            return false;
        }
    }



}