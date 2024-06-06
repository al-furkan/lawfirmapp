<?php
class Database {
    public $con;

    public function __construct() {
        // Define your database connection details
        $host = 'localhost';
        $dbname = 'attend';  // Replace with your actual database name
        $username = 'root';  // Replace with your actual database username
        $password = '';  // Replace with your actual database password

        try {
            $this->con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
?>
