<?php

namespace App\Core;

use PDO;
use PDOException;

class Connection {
    protected $db;

    public function __construct() {
        try {
            $dsn = 'pgsql:host=postgres_db;port=5432;dbname=db';
            $username = 'postgres';
            $password = 'postgres';
        
            $this->db = new PDO($dsn, $username, $password); 
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
?>