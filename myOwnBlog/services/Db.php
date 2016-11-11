<?php

/**
 * Created by PhpStorm.
 * User: ghettogeek
 * Date: 26.10.16
 * Time: 16:02
 */

include '../models/IDbAccess.php';

class Db implements IDbAccess
{
    protected $host = "localhost";
    protected $login = "root";
    protected $password = "root";
    protected $dataBase = "devBlog";
    protected $conn;

    protected static $instance = null;

    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new static;
        }
        return self::$instance;

    }


    public function getConnection()
    {
        if(is_null($this->conn)){
            $this->conn = new mysqli(

                $this->host,
                $this->login,
                $this->password,
                $this->dataBase
            );
        }
        if(!$this->conn){
            throw new DbException("Что-то пошло не так");
        }

        return $this->conn;
    }

/**
 * @return
 */
    public function query($sql)
    {
        return $this->getConnection()->query($sql);
    }

    public function fetchAll($sql)
    {
        $res = $this->query($sql);

        return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchObject($sql, $class)
    {
        $res = $this->query($sql);
        return $res->fetch_object($class);
    }
}