<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02/04/2019
 * Time: 12:13
 */

namespace Tudublin;


use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;

class PersonnelRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct("Tudublin", "Personnel", "personnel");
    }

    public function existsPersonnel($username, $password)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();


        $sql = "SELECT * FROM personnel WHERE username = '$username' AND password = '$password' LIMIT 1";

        $stmt = $connection->query($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\Tudublin\Personnel');
        $user = $stmt->fetch();

        if($user){
            return true;
        } else {
            return false;
        }
    }
}