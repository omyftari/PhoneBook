<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/10/2018
 * Time: 8:35 PM
 */

namespace Controllers\Models;


class Phones{
    public $type;
    public $phoneNumber;

    /**
     * Phones constructor.
     * @param $type
     * @param $phoneNumber
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}