<?php

namespace Martian\Scandi\Classes;

use PDO;
use PDOException;
use Exception;
use Martian\Scandi\Interfaces\DatabaseInterface;

class Database implements DatabaseInterface
{
    private $pdo;
    
    private $driver;

    private $host;

    private $port;

    private $username;

    private $password;

    private $database;
    
    private $charset;

    private $dsn;

    public function __construct()
    {
        $this->driver = config('database.mysql.driver');
        $this->host = config('database.mysql.host');
        $this->port = config('database.mysql.port');
        $this->username = config('database.mysql.username');
        $this->password = config('database.mysql.password');
        $this->database = config('database.mysql.database');
        $this->charset = config('database.mysql.charset');
        $this->dsn = "{$this->driver}:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}";
    }

    public function connect()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}