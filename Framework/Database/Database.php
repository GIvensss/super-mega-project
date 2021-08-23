<?php

namespace Framework\Database;

use PDO;

class Database
{
    private static $instance;

    private static ?PDO $db = null;
    private array $dbparams;


    public function __construct()
    {
        $this->dbparams = require('App/Config/dbparams.php');

        $connection = $this->dbparams['DB_CONNECTION'];
        $host = $this->dbparams['DB_HOST'];
        $dbname = $this->dbparams['DB_DATABASE'];
        $dsn = $connection . ':dbname=' . $dbname . ';host=' . $host;

        $user = $this->dbparams['DB_USERNAME'];
        $password = $this->dbparams['DB_PASSWORD'];

        self::$db = new PDO($dsn, $user, $password);
    }

    public function query(string $query, array $params = [])
    {
        $statement = self::$db->prepare($query);

        foreach ($params as $key => &$value) {
            $statement->bindParam($key, $value);
        }
        $statement->execute();
        return $statement;
    }

    public function lastInsertId($name = null): string
    {
        return self::$db->lastInsertId($name);
    }

    public function beginTransaction()
    {
        self::$db->beginTransaction();
    }

    public function commit()
    {
        self::$db->commit();
    }

    public function rollback()
    {
        self::$db->rollBack();
    }
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
