<?php
namespace ModernWays\FricFrac\Model;

class Role{
    private $address1;
    private $id;
    //private $list;
    
    public function setAddress1($value){
        $this->address1 = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    
    public function setId($value){
        $this->id = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    public function getAddress1(){
        return $this->address1;
    }
    
    
     public function getId(){
        return $this->id;
    }
    
    public function toArray(){
        return array(
            "Address1" => $this->getAddress1(),
            "Id" =>   $this->getId());
            
    }
    
    public function arrayToObject($array){
        $this->setAddress1($array['Address1']);
        $this->setId($array['Id']);
    }
}