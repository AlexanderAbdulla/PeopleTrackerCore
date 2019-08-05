<?php
class User
{
    // Databse variables 
    protected $username;

    // Constructor
    function __construct($newUsername) {
        $this->username = $newUsername;
    } 

    function getUsername() {
        return $this->username;
    }

}
?>