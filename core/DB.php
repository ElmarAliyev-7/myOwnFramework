<?php

namespace Core;

use PDO;
use PDOException;

class DB
{
    public PDO $conn;
    private string $table;
    private string $select = "";
    private string $where = "";

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

    public function where(array|string $column, $value = null): static
    {
        if(!is_array($column)) {
            $this->where .= " WHERE " . $column . "=" . "'$value'";
            return $this;
        }

        $this->where = " WHERE";
        foreach ($column as $key => $value) :
            $this->where .= " " . $key . "=" . "'$value' AND";
        endforeach;
        $this->where = substr($this->where, 0, -3);
        return $this;

    }

    public function all(): false|array
    {
        $query = "SELECT * FROM " . $this->table;
        if(!empty($this->where)) $query .= $this->where;

        $sth = $this->conn->prepare($query);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get()
    {
        $query = "SELECT * FROM " . $this->table;
        if(!empty($this->select)) $query = $this->select;
        if(!empty($this->where)) $query .= $this->where;

        $sth = $this->conn->prepare($query);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}