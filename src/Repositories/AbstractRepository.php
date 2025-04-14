<?php

namespace Autodeal\Repositories;

use PDO;

abstract class AbstractRepository implements RepositoryInterface
{
    protected PDO $connection;
    protected string $tableName = "";
    public function __construct() {
        $dsn = 'pgsql:host='.getenv('DB_HOST'). ';port='.getenv('DB_PORT').';dbname='.getenv('DB_NAME');
        $this->connection = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'));
    }

    public function findAll() : array {
        $stmt = $this->connection->prepare("SELECT * FROM $this->tableName");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findByAttribute(mixed $param, string $attribute): array {
        $stmt = $this->connection->prepare("SELECT * FROM {$this->tableName} WHERE {$attribute} = :param");
        $stmt->execute(['param' => $param]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}