<?php
namespace App\Models;
class DatabaseModel{
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "networkapp";
    private $port = "8888";
    
    function getConnection(){
        // Create connection to the database
        $conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname, $this->port);
        
        if( $conn->connect_error){
            echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
        }else{
            return $conn;
        }
    }
}
