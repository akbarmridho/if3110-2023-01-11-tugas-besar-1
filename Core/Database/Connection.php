<?php

namespace Core\Database;

use PDO;
use PDOException;
use PDOStatement;

class Connection
{
    public function __construct(protected PDO $pdo)
    {
    }

    public function executeStatement(string $sql, $parameters = []): bool|PDOStatement
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);

        return $statement;
    }

    /**
     * Create a new PDO connection.
     */
    public static function make(array $config): PDO
    {
        try {
            return new PDO(
                $config['type'] . ":host=" . $config['host'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}