<?php

namespace Core;

use PDO;
use PDOException;

class DB
{
    private string $serverName = 'localhost';
    private string $dbName = 'my_own_framework';
    private string $username = 'root';
    private string $password = '';
    private static DB $instance;
    public PDO $conn;
    private static string $table;

    public function __construct()
    {
        try {
            // Check if the connection is already established
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();
        if (method_exists($instance, $name)) {
            return call_user_func_array([$instance, $name], $arguments);
        }
        // If the method doesn't exist, you can set properties or perform other actions here if needed.
    }

    public static function getInstance(): DB
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function table(string $tableName): DB
    {
        self::$table = $tableName;
        return new self();
    }

    public function get(): false|array
    {
        $sth = $this->conn->prepare("SELECT * FROM " . self::$table);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
    }
}