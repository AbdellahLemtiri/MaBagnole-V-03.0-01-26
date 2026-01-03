<?php
// C:\xampp\htdocs\MaBagnoleV1\app\Database\Database.php

namespace App\Database;
use App\Utils\Logger;
use PDO;
use PDOException;

class Database {

   
    private static $instance = null;
    private $conn;

    private $host = "localhost";
    private $db_name = "mabagnole";
    private $username = "root";
    private $password = "";

    
    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
          Logger::log($exception->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    private function __clone() {}
}