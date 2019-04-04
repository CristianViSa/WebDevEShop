<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03/04/2019
 * Time: 16:36
 */

namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;
use Mattsmithdev\PdoCrudRepo\DatabaseManager;

class SmartphoneRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct("Tudublin", "Smartphone", "Smartphone");
    }

    public function buyPhone($id){
        $db = new DatabaseManager();
        $connection = $db->getDbh();


        $sql = "SELECT * FROM Smartphone WHERE id = '$id'";

        $stmt = $connection->query($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Tudublin\Smartphone');
        $smartphone = $stmt->fetch();

        if($smartphone){
            $store = $smartphone->getStore();
            if ($store == 0){
                return false;
            }
            else{
                $store = $store - 1;
                $sql = "Update Smartphone Set store='$store' Where id='$id'  LIMIT 1";
                $stmt = $connection->query($sql);
            }
            return true;
        } else {
            return false;
        }
    }
}