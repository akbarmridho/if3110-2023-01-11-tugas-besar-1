<?php

namespace Core\Database;

use ArrayObject;
use PDO;
use PDOException;
use PDOStatement;

class Connection
{
    public function __construct(protected PDO $pdo)
    {
    }

    /**
     * Prepare query with params
     * returns selected rows as Array of Arrays
     */
    public function executeStatement(string $sql, $parameters = []): array
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
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