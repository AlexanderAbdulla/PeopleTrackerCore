<?php
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
    function _initTest() {
        $this->servername = "localhost";
        $this->dbusername = "root";
        $this->dbpassword = "";
        $this->dbname = "test";
        $this->conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    }

    // Will initialize the production db
    function _initProd() {
        //TODO fill
    }
    
    
}
?>