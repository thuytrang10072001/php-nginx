<?php

namespace App\core;

use PDO;
use PDOException;

class Model {
    protected $db;

    public function __construct() {
        try {
            $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=db';
            $username = 'postgres';
            $password = 'postgres';
        
            $this->db = new PDO($dsn, $username, $password); 
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
?>