<?php
require '../models/user.php';
class DbSuper
{
    // Databse variables 
    protected $servername;
    protected $dbusername;
    protected $dbpassword;
    protected $dbname;
    protected $conn;

    // Constructor
    function __construct() {
        $this->_initTest();
        $this->connect();
    } 

    // Initializes the test database
    protected function _initTest() {
        $this->servername = "localhost";
        $this->dbusername = "root";
        $this->dbpassword = "";
        $this->dbname = "test";
    }

    // Will initialize the production db
    protected function _initProd() {
        //TODO fill
    }

    // Try to connect 
    protected function connect() {
        $this->conn = new mysqli($this->servername, 
            $this->dbusername, $this->dbpassword, $this->dbname);
    }

    // Logs in a user 
    function loginUser($username, $password) {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        while($row = $result->fetch_assoc()) {
            if(($row['email'] === $username) && ($row['password'] === $password)) {
                $user = new User($username, $row['id'], $this->conn);
                return $user;
            }
        }

        return false;
    }

    // Sign up a user
    function signupUser($username, $password) {
        echo 'in signup user <br>';
        $sql = "INSERT INTO users (email, password) VALUES ('$username', '$password')";
        echo $sql;
        $result = $this->conn->query($sql);
        if (!$result) {
            echo $this->conn->error;
        }
        return $result;
    }
    
}
?>