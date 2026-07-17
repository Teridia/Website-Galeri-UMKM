<?php

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): ?PDO
    {
        if(self::$connection !== null) {
            return self::$connection;
        }

        $config = require __DIR__ . '/../../config/database.php';

        if (!is_array($config)) {
            throw new RuntimeException('Database configuration is invalid.');
        }

        $dsn = sprintf(
            "mysql:host=%s;port=%d;dbname=%s;charset=%s",
            $config['host'],
            $config['port'],
            $config['dbname'],
            $config['charset']
        ); 

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            self::$connection = new PDO(
                $dsn, 
                $config['username'],
                $config['password'],
                $options
            );
            return self::$connection;

        } catch (PDOException $e) {
            error_log('Database connection error: ' . $e->getMessage());
            throw new Exception("Database connection failed.");
        }
    }
}