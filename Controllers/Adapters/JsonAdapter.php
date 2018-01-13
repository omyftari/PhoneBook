<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/9/2018
 * Time: 11:18 PM
 */

namespace Controllers\Adapters;

use Controllers\Contracts\AdapterContract;

class JsonAdapter implements AdapterContract
{

    public $jsonFile = "././Resources/bookManager.json";

    public function writeData($data)
    {
        // TODO: Implement writeData() method.
        $jsonData = json_encode($data);
        file_put_contents($this->jsonFile, $jsonData);
    }

    public function readData()
    {
        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData);
        return $data;
    }
}