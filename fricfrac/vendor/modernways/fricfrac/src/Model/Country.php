<?php
namespace ModernWays\FricFrac\Model;

class Country {
    private $name;
    private $code;
    private $id;

    public function setName($value) {
        $this->name = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    public function setCode($value) {
        $this->code = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    public function setId($value) {
        $this->id = \ModernWays\Helpers::cleanUpInput($value);
    }
    
        public function getName() {
        return $this->name;
    }
    
    public function getCode() {
        return $this->code;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function toArray() {
        return array(
            "Name" => $this->getName(),
            "Code" => $this->getCode(),
            "Id" => $this->getId());
    }
    
    public function arrayToObject($array) {
        $this->setName($array['Name']);
        $this->setCode($array['Code']);
        $this->setId($array['Id']);
    }
    
}