<?php

namespace App\FrameworkTools\Database;

class DatabaseConnection {

    private static $instance;

    private $pdo;

    private function __construct() {
        
        $database = env('DB_DATABASE');
        $user = env('DB_USER');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $port = env('DB_PORT');
        
// PDO objeto string de conexão
        $this->pdo = new \PDO(
            "mysql:host=localhost;dbname=frameworksenac;port=3306;", 
            "root", 
            ""
        );
    }
//      SINGLETON
    public static function start() {
        if (!DatabaseConnection::$instance) {
            DatabaseConnection::$instance = new DatabaseConnection();
        }

        return DatabaseConnection::$instance;
    }

    public function getPDO() {
        return $this->pdo;
    }
} 