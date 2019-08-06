<?php
//requires
require_once '../models/contact.php';
class User
{
    // Instance Variables
    protected $username;
    protected $userID;
    protected $conn;
    protected $contacts;
    // Constructor
    function __construct($newUsername, $newUserId, $newConn) {
        $this->userID = $newUserId;
        $this->username = $newUsername;
        $this->conn = $newConn;
        $this->contacts = [];
        $this->_init();
    } 

    function _init() {
        // make our db query to get all contacts 
        $sql = "SELECT * FROM contacts WHERE user_id = '$this->userID'";
        $result = $this->conn->query($sql);
        var_dump($result);
        while($row = $result->fetch_assoc()) {
            //var_dump($row);
            $contact = new Contact($row['firstMeetingLocation'], $row['job'], $row['lastContacted'],
                    $row['name'], $row['details'], $row['primaryContactMethod']);
            $this->contacts[] = $contact; 
        }
        
    }

    function getUsername() {
        return $this->username;
    }

    function getContacts() {
        return $this->contacts; 
    }

    function setConn($newConn) {
        $this->conn = $newConn;
    }

    function addContact($contact) {
        $sql = "INSERT INTO Contacts (firstMeetingLocation, job, lastContacted, name, user_id, primaryContactMethod) 
            VALUES ('" . $contact->getFirstMeetingLocation() . "', '" . $contact->getJob() . "', '" . $contact->getLastContacted() . "', 
            '" .$contact->getName() . "', '" . $this->userID . "', '" . $contact->getPrimaryContactMethod() . "')";
        $result = $this->conn->query($sql);
        $this->contacts[] = $contact; 
    }
}
?>