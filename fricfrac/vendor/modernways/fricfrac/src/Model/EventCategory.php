<?php
namespace ModernWays\FricFrac\Model;

class EventCategory{
    private $name;
    private $id;
    //private $list;
    
    public function setName($value){
        $this->name = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    
    public function setId($value){
        $this->id = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    public function getName(){
        return $this->name;
    }
    
    
     public function getId(){
        return $this->id;
    }
    
    public function toArray(){
        return array(
            "Name" => $this->getName(),
            "Id" =>   $this->getId());
            
    }
    
    public function arrayToObject($array){
        $this->setName($array['Name']);
        $this->setId($array['Id']);
    }
}