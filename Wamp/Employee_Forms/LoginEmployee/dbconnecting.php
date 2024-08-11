<?php 
   // Database connection
$host = "localhost";
$user = "root";
$password = ""; 
$database = "badrpayroll"; 

class DBHandle {
    private $connection;

    public function __construct($host, $user, $password, $database) {
        $this->connection = new mysqli($host, $user, $password, $database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function runQuery($query) {
        $result = $this->connection->query($query);
        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }
        return $result;
    }

    public function updateQuery($query) {
        $result = $this->connection->query($query);
        if (!$result) {
            die("Update query failed: " . $this->connection->error);
        }
        return $result;
    }

    public function insertQuery($query) {
        $result = $this->connection->query($query);
        if (!$result) {
            die("Insert query failed: " . $this->connection->error);
        }
        return $result;
    }
	
	public function deleteQuery($query) {
        $result = $this->connection->query($query);
        if (!$result) {
            die("Delete query failed: " . $this->connection->error);
        }
        return $result;
    }
	
	
}



$db_handle = new DBHandle($host, $user, $password, $database);
	
?>