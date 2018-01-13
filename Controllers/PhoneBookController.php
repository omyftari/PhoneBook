<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/9/2018
 * Time: 9:54 PM
 */

namespace Controllers;

use Controllers\Adapters\JsonAdapter;
use Controllers\Adapters\XmlAdapter;
use Controllers\Models\BookManager;

class PhoneBookController
{

    public function getPhoneBooks(){
        $phoneBook = new BookManager(new JsonAdapter());
        return $phoneBook->readPhoneRegistry();
    }

    public function addNewPhoneBook(){
        $inputs = $_POST;
        $phoneBook = new BookManager(new JsonAdapter());
        return $phoneBook->addNewPhoneBook($inputs);
    }

    public function delete(){
        $inputs = $_POST;
        $phoneBook = new BookManager(new JsonAdapter());
        return $phoneBook->delete($inputs);
    }

    public function update(){
        $inputs = $_POST;
        $phoneBook = new BookManager(new JsonAdapter());
        return $phoneBook->update($inputs);
    }

}