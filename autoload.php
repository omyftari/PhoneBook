<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/10/2018
 * Time: 7:52 PM
 */

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});