<?php

namespace Models;

require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/config.php';

class Database
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct()
    {
        $this->hostname = HOST_NAME;
        $this->username = USER_NAME;
        $this->password = PASSWORD;
        $this->dbname = DB_NAME;

        try {
            $this->conn = new \PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function closeConn()
    {
        $this->conn = null;
    }
}
