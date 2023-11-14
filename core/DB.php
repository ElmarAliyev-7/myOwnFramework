<?php

namespace Core;

use PDO;
use PDOException;

class DB
{
    public PDO $conn;
    private string $table;
    private string $query;
    private string $select;

    public function __construct()
    {
        try {
            // Check if the connection is already established
            $this->conn = new PDO("mysql:host=" . serverName . ";dbname=" . dbName, dbUsername,
                dbPassword);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function prepare()
    {
        $this->query = '';
    }

    public function table(string $tableName): static
    {
        $this->table = $tableName;
        return $this;
    }

    public function all(): false|array
    {
        $sth = $this->conn->prepare("SELECT * FROM " . $this->table);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
    }

    public function get(): false|array
    {
        $sth = $this->conn->prepare("SELECT * FROM " . $this->table);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array;
    }
}