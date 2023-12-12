<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';

use Models\Database;

class Clientes
{
    private $conn;

    public function __construct()
    {
        $dbase = new Database();
        $this->conn = $dbase->getConn();
    }

    public function All()
    {
        $sql = "SELECT * FROM clientes";

        try {
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $rs = $stm->fetchAll(\PDO::FETCH_ASSOC);
            return $rs;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
