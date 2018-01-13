<?php
include 'Controllers/PhoneBookController.php';
include 'autoload.php';
include_once 'lib/API/src/Epi.php';
include_once 'lib/API/src/EpiApi.php';

Epi::init('route');
getRoute()->get('/getPhoneBooks', array('Controllers\PhoneBookController', 'getPhoneBooks'), EpiApi::external);
getRoute()->post('/delete', array('Controllers\PhoneBookController', 'delete'), EpiApi::external);
getRoute()->post('/update', array('Controllers\PhoneBookController', 'update'), EpiApi::external);
getRoute()->post('/addNewPhoneBook', array('Controllers\PhoneBookController', 'addNewPhoneBook'), EpiApi::external);
getRoute()->run();

