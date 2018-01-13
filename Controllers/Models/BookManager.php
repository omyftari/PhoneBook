<?php

namespace Controllers\Models;

use Controllers\Contracts\AdapterContract;

class BookManager
{
    private $adapter;
    private $isFileEmty = false;
    private $allPhoneData = [];

    public function __construct(AdapterContract $adapter)
    {
        $this->adapter = $adapter;
        echo $this->adapter->readData() == '';
        if ($this->adapter->readData() == '') {
            $this->isFileEmty = true;
        } else {
            $alldata = $this->adapter->readData();
            foreach ($alldata as $person_data) {
                $phone = new Phones();
                $person = new Person();
                $person->setFirstName($person_data->firstName);
                $person->setLastName($person_data->lastName);

                foreach ($person_data->phones as $phone_data) {
                    $phone->setPhoneNumber($phone_data->phoneNumber);
                    $phone->setType($phone_data->type);
                    $person->setPhones($phone);
                }


                array_push($this->allPhoneData, $person);
            }

        }
    }

    public function readPhoneRegistry()
    {

        return $this->allPhoneData;
    }

    public function addNewPhoneBook($data)
    {
        $mobileArray = [];
        $mobiles = new Phones();
        $person = new Person();

        $person->setFirstName($data['name']);
        $person->setLastName($data['lastName']);

        $mobiles->setPhoneNumber($data['phone']);
        $mobiles->setType($data['type']);

        $person->setPhones($mobiles);


        array_push($this->allPhoneData, $person);

        $this->adapter->writeData($this->allPhoneData);
        return ['message' => 'Phone added'];
    }

    public function search($data)
    {

        $searchBy = $data['searchBy'];
        $value = $data['value'];
        $searchResult = ['person' => [], 'phones' => []];
        foreach ($this->allPhoneData as $index => $p_data) {
            if ($p_data->$searchBy == $value) {
                array_push($searchResult['person'], $index);
            }
            foreach ($p_data->phones as $index2 => $phone) {
                if ($phone->$searchBy == $value) {
                    array_push($searchResult['person'], $index);
                    array_push($searchResult['phones'], $index2);
                }
            }
        }
        return $searchResult;
    }

    public function delete($data)
    {
        $indexes = $this->search($data);
        foreach ($indexes['person'] as $index) {
            unset($this->allPhoneData[$index]);
        }

        $this->allPhoneData = array_values($this->allPhoneData);
        $this->adapter->writeData($this->allPhoneData);
        return ['message' => 'Element was deleted'];
    }

    public function update($data)
    {
        $data = [
            'searchBy' => $data['searchBy'],
            'value' => $data['value'],
            'update' => $data['update'],
            'value_update' => $data['value_update']
        ];
        $updateBy = $data['update'];

        $indexes = $this->search($data);
        foreach ($indexes['person'] as $index) {
            if (property_exists($this->allPhoneData[$index], $updateBy)) {
                $this->allPhoneData[$index]->$updateBy = $data['value_update'];
            }
            for ($i = 0; $i< sizeof($this->allPhoneData[$index]->phones); $i++){
                if(property_exists($this->allPhoneData[$index]->phones[$i], $updateBy)){
                    $this->allPhoneData[$index]->phones[$i]->$updateBy = $data['value_update'];
                   /// var_dump($this->allPhoneData[$index]->phones[$i]);
                }
            }
            foreach ($indexes['phones'] as $index2) {
                $this->allPhoneData[$index]->phones[$index2]->$updateBy = $data['value_update'];

            }
        }
        $this->adapter->writeData($this->allPhoneData);
        return ['message' => 'Element was updated'];

    }
}