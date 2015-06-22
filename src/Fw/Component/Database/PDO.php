<?php
namespace Fw\Component\Database;

class PDO implements MySQL
{
    private $db;

    public function __construct($db, $host, $user, $password)
    {
        try {
            $dbh = new \PDO("mysql:host=$host", $user, $password);
            $dbh->exec("CREATE DATABASE" . 
                            $db . 
                            ";
                        USE" . 
                            $db .
                            ";
                        ")
                        // CREATE TABLE IF NOT EXISTS 
                        //     $tableName;
                        //     (
                        //         id INT(10) PRIMARY KEY AUTO_INCREMENT,
                        //         username VARCHAR(255) NOT NULL,
                        //         password VARCHAR(255) NOT NULL
                        //     );
                or die(print_r($dbh->errorInfo(), true));
        } 
        catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
        $this->db = new \PDO("mysql:dbname=$db;host=$host", $user, $password);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    public function prepare($query)
    {
        return $this->db->prepare($query);
    }
}
