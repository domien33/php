<?php
namespace ModernWays\FricFrac\Model;

class Event{
    private $name;
    private $location;
    private $id;
    private $starts;
    private $ends;
    private $description;
    private $organiserName;
    private $image;
    private $organiserDescription;
    private $eventCategoryId;
    private $eventTopicId;
    //private $list;
    
    public function setName($value){
        $this->name = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    public function setLocation($value){
        $this->location = \ModernWays\Helpers::cleanUpInput($value);
    }
    
    public function setId($value){
        $this->id = \ModernWays\Helpers::cleanUpInput($value);
    }
    
     public function setImage($value){
        $this->image = \ModernWays\Helpers::cleanUpInput($value);
    }
    
     public function setStarts($value){
        
        $this->starts = $value;
    }
    
     public function setEnds($value){
        
        $this->ends = $value;
    }
    
     public function setDescription($value){
        $this->description = $value;
    }
    
     public function setOrganiserName($value){
        $this->organiserName = $value;
    }
    
     public function setOrganiserDescription($value){
        $this->organiserDescription = $value;
    }
    
     public function setEventCategoryId($value){
        $this->eventCategoryId = $value;
    }
    
     public function setEventTopicId($value){
        $this->eventTopicId = $value;
    }
  
    public function getName(){
        return $this->name;
    }
    
     public function getId(){
        return $this->id;
    }
    
     public function getLocation(){
        return $this->location;
    }
    
     public function getImage(){
        return $this->image;
    }
    
     public function getStarts(){
        return $this->starts;
    }
    
     public function getStartDate(){
        $startdate = new \DateTime($this->starts);
        return $startdate->format('H:i:s');
    }
    
     public function getStartTime(){
        $startdate = new \DateTime($this->starts);
        return $startdate->format('Y-m-d');
    }
    
     public function getEndTime(){
        $date = new \DateTime($this->ends);
        return $date->format('H:i:s');
    }
    
     public function getEndDate(){
        $date = new \DateTime($this->ends);
        return $date->format('Y-m-d');
    }
    
    
     public function getEnds(){
        return $this->ends;
    }
    
     public function getDescription(){
        return $this->description;
    }
    
    public function getOrganiserName() {
        return $this->organiserName;
    }
     
    public function getOrganiserDescription() {
        return $this->organiserDescription;
    }
     
    public function getEventCategoryId() {
        return $this->eventCategoryId;
    }
     
    public function getEventTopicId() {
        return $this->eventTopicId;
    }
    
    public function toArray() {
        return array(
            "Name" => $this->getName(),
            "Location" => $this->getLocation(),
            "Id" => $this->getId(),
            "Image" => $this->getImage(),
            "Starts" => $this->getStarts(),
            "Ends" => $this->getEnds(),
            "Description" => $this->getDescription(),
            "OrganiserName" => $this->getOrganiserName(),
            "OrganiserDescription" => $this->getDescription(),
            "EventCategoryId" => $this->getEventCategoryId(),
            "EventTopicId" => $this->getEventTopicId());
    }
    
    public function arrayToObject($array) {
        $this->setName($array['Name']);
        $this->setLocation($array['Location']);
        $this->setId($array['Id']);
        $this->setImage($array['Image']);
        $this->setStarts($array['Starts']);
        $this->setEnds($array['Ends']);
        $this->setDescription($array['Description']);
        $this->setOrganiserName($array['OrganiserName']);
        $this->setOrganiserDescription($array['OrganiserDescription']);
        $this->setEventCategoryId($array['EventCategoryId']);
        $this->setEventTopicId($array['EventTopicId']);
    }
    
}