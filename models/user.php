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
        $this->_initContacts();
    } 

    function _initContacts() {
        // Empty contacts
        $this->contacts = [];
        // make our db query to get all contacts 
        $sql = "SELECT * FROM contacts WHERE user_id = '$this->userID'";
        $result = $this->conn->query($sql);
        var_dump($result);
        while($row = $result->fetch_assoc()) {
            //var_dump($row);
            $contact = new Contact($row['firstMeetingLocation'], $row['job'], $row['lastContacted'],
                    $row['name'], $row['details'], $row['primaryContactMethod'], $row['id']);
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
        $this->_initContacts();
    }
    
    function editContact($contactID,  $firstMeetingLocation, $job, $lastContacted, $name, $primaryContactMethod) {
        $sql = "UPDATE Contacts SET firstMeetingLocation = '$firstMeetingLocation',  job = '$job', 
            lastContacted = '$lastContacted', name = '$name', primaryContactMethod = '$primaryContactMethod' WHERE id = '$contactID'";
        $result = $this->conn->query($sql);
        $this->_initContacts();
    }

    /*
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
    */

    function getID() {
        return $this->userID;
    }
}
?>