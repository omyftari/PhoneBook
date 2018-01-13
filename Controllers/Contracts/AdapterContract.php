<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/9/2018
 * Time: 11:16 PM
 */
namespace Controllers\Contracts;

interface AdapterContract
{
    public function writeData($data);
    public function readData();

}