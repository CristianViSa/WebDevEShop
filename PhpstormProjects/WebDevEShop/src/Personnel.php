<?php
/**
 * Created by PhpStorm.
 * Personnel: user
 * Date: 02/04/2019
 * Time: 12:07
 */

namespace Tudublin;


class Personnel
{
    private $id = -1;
    private $username;
    private $password;
    private $email;
    private $telephone;
    private $userType;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    public function isAdmin(){
        if ($this->userType == 'admin'){
            return true;
        }
        return false;
    }

    public function isStaff(){
        if($this->userType == 'staff'){
            return true;
        }
        return false;
    }

    public function isUser(){
        if($this->userType == 'user'){
            return true;
        }
        return false;
    }
}