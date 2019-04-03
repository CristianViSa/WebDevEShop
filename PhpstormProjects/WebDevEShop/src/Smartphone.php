<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/04/2019
 * Time: 16:34
 */

namespace Tudublin;


class Smartphone
{
    private $id = -1;
    private $store;
    private $name;
    private $photo;
    private $price;

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

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
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param mixed $store
     */
    public function setStore($store)
    {
        $this->store = $store;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function buyPhone(){
        $this->store = $this->store - 1;
    }

    public function addPhone(){
        $this->store = $this->store - 1;
    }

    public function __toString()
    {
        return "Name : $this->name <br> 
                Price : $this->price <br> 
                $this->store <br> 
                <img src= __DIR__  '/../img/' \"$this->photo\" alt='picture of the phone'";
    }
}