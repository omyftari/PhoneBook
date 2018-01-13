<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/10/2018
 * Time: 8:35 PM
 */

namespace Controllers\Models;


class Person
{
    public $firstName;
    public $lastName;
    public $phones = [];

    /**
     * Person constructor.
     * @param $firstName
     * @param $lastName
     * @param array $phones
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param array $phones
     */
    public function setPhones($phones)
    {
        array_push($this->phones, $phones);
    }

}