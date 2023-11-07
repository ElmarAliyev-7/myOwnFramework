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

    public PDO $conn;
    private static string $table;

    public function __construct()
    {
        try {
            // Check if the connection is already established
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbName",
                $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
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