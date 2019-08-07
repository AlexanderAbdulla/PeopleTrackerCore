<?php

    class Contact {

    // Instance Variables
    protected $firstMeetingLocation;
    protected $job;
    protected $lastContacted;
    protected $name;
    protected $details;
    protected $primaryContactMethod;
    protected $ID; 

    // Constructor
    function __construct($firstMeetingLocation, $job, $lastContacted, $name, $details = null, $primaryContactMethod, $ID = null) {
        $this->firstMeetingLocation = $firstMeetingLocation;      
        $this->job = $job;
        $this->lastContacted = $lastContacted;
        $this->name = $name;
        $this->details = $details;
        $this->primaryContactMethod = $primaryContactMethod; 
        $this->ID = $ID;
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

    function getID() {
        return $this->ID;
    }
}
?>