<?php

declare(strict_types=1);

namespace App\Helpers;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private static $connection = null;

    public static function runQuery($query): PDOStatement
    {
        $pdo = self::getConnection();
        $stmt = $pdo->query($query);

        return $stmt;
    }

    public static function runPreparedStatement($statement, $params): PDOStatement
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($statement);
        $stmt->execute($params);

        return $stmt;
    }

    private static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::$connection = self::createConnection();
        }
        return self::$connection;
    }

    private static function createConnection(): PDO
    {
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] .
            ';dbname=' . $_ENV['DB_NAME'] .
            ';charset=' . $_ENV['DB_CHARSET'] .
            ';port=' . $_ENV['DB_PORT'];

        try {
            return new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        } catch (PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }
}