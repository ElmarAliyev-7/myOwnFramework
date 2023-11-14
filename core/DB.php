<?php

namespace Core;

use PDO;
use PDOException;

class DB
{
    public PDO $conn;
    private string $table;
    private string $query = "";
    private string $select = "";

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

    public function table(string $tableName): static
    {
        $this->table = $tableName;
        return $this;
    }

    public function select(...$params): static
    {
        $select = "SELECT ";
        foreach ($params as $key => $param) {
            $select .= $param;
            if(count($params) - 1 > $key) $select .= ",";
        }
        $select .= " FROM " . $this->table;
        $this->select = $select;
        return $this;
    }

    public function all(): false|array
    {
        $sth = $this->conn->prepare("SELECT * FROM " . $this->table);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get(): false|array
    {
        $query = "SELECT * FROM " . $this->table;
        if(!empty($this->select)) $query = $this->select;

        $sth = $this->conn->prepare($query);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}