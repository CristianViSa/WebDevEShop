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
        if(isset($_SESSION['username']) and isset($_SESSION['userType'])){
            return true;
        } else {
            return false;
        }
    }

    public function storeUsername($username)
    {
        $_SESSION['username'] = $username;
    }

    public function storeUserType($userType)
    {
        $_SESSION['userType'] = $userType;
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

    public function userTypeFromSession()
    {
        if(isset($_SESSION['userType'])){
            return $_SESSION['userType'];
        } else {
            return false;
        }
    }


}