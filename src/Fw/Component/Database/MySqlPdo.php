<?php
namespace Fw\Component\Database;

final class MySqlPdo implements MySQL
{
    private $db;

    public function __construct($db, $host, $user, $password)
    {
        try {
            $dbBuilder = new \PDO("mysql:host=$host", $user, $password);
            $dbBuilder->exec("CREATE DATABASE IF NOT EXISTS " . 
                            $db . 
                            ";
                        USE " . 
                            $db .
                            ";
                        ")
                or die(print_r($dbBuilder->errorInfo(), true));
            $this->db = new \PDO("mysql:dbname=$db;host=$host", $user, $password);
            // $this->db->exec("SET CHARACTER SET utf8");
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    }

    public function prepare($query)
    {
        return $this->db->prepare($query);
    }
}
