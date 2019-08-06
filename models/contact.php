<?php

    class Contact {

    // Instance Variables
    protected $firstMeetingLocation;
    protected $job;
    protected $lastContacted;
    protected $name;
    protected $details;
    protected $primaryContactMethod;

    // Constructor
    function __construct($firstMeetingLocation, $job, $lastContacted, $name, $details, $primaryContactMethod) {
        $this->firstMeetingLocation = $firstMeetingLocation;      
        $this->job = $job;
        $this->lastContacted = $lastContacted;
        $this->name = $name;
        $this->details = $details;
        $this->primaryContactMethod = $primaryContactMethod; 
    } 

    function getFirstMeetingLocation() {
        return $this->firstMeetingLocation;
    }

    function getJob() {
        return $this->job;
    }

    function getLastContacted() {
        return $this->lastContacted;
    }

    function getName() {
        return $this->name;
    }

    function getDetails() {
        return $this->details;
    }

    function getPrimaryContactMethod() {
        return $this->primaryContactMethod;
    }
}
?>