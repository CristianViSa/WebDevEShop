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
}