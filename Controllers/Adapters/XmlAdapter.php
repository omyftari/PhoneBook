<?php
namespace Controllers\Adapters;
use Controllers\Contracts\AdapterContract;
use SimpleXMLElement;
use XML_Serializer;
use XML_Unserializer;

error_reporting(E_ALL);
require_once 'XML/Serializer.php';
require_once 'XML/Unserializer.php';


/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/10/2018
 * Time: 12:37 PM
 */
class XmlAdapter implements AdapterContract
{
    public $xmlFile = "././Resources/bookManager.xml";

    public function writeData($data)
    {
        var_dump($data);
        $xml = $this->generate_valid_xml_from_array($data);
        file_put_contents($this->xmlFile, $xml);
    }

    public function readData()
    {
        $xmlData = file_get_contents($this->xmlFile);
        $unserializer = new XML_Unserializer();
        $unserializer->unserialize($xmlData);

        if(isset($unserializer->getUnserializedData()->code)){
            return '';
        }
        var_dump( $unserializer->getUnserializedData());
    }

    function json_to_xml($obj) {
        $serializer = new XML_Serializer();
        $serializer ->serialize((array)$obj);
        return $serializer -> getSerializedData();
    }

    function generate_xml_from_array($array, $node_name) {
        $xml = '';

        if (is_array($array) || is_object($array)) {
            foreach ($array as $key=>$value) {
                if (is_numeric($key)) {
                    $key = $node_name;
                }

                $xml .= '<' . $key . '>' . "\n" . $this->generate_xml_from_array($value, $node_name) . '</' . $key . '>' . "\n";
            }
        } else {
            $xml = htmlspecialchars($array, ENT_QUOTES) . "\n";
        }

        return $xml;
    }

    function generate_valid_xml_from_array($array, $node_block='nodes', $node_name='node') {
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>' . "\n";

        $xml .= '<' . $node_block . '>' . "\n";
        $xml .= $this->generate_xml_from_array($array, $node_name);
        $xml .= '</' . $node_block . '>' . "\n";

        return $xml;
    }
}