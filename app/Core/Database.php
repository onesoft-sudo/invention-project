<?php


namespace App\Core;


use PDO;

class Database
{
    public ?PDO $pdo;

    public function __construct($env)
    {
        $this->pdo = new PDO($env['DB_DSN']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql)
    {
        return $this->pdo->query($sql);
    }

    public function queryFetch($sql, $params = null): array
    {
        return $this->pdo->query($sql)->fetchAll($params !== null ? $params : PDO::FETCH_ASSOC);
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}