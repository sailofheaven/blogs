<?php

namespace Core;

use \PDO;

/**
 * Class DB
 * @package Core
 */
class DB
{
    private static $conn;

    /**
     * @param $host
     * @param $username
     * @param $secret
     * @param $dbname
     */
    public static function connect($host, $username, $secret, $dbname)
    {
        if (!static::$conn) {
            try {
                $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
                static::$conn = new PDO($dsn, $username, $secret, array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
                static::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

    }

    /**
     * @return mixed
     */
    public static function getDB()
    {
        return static::$conn;
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public static function query($sql, $params = [])
    {
        try {
            $stmt = static::$conn->prepare($sql);
            $data = $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public static function getLastInsID()
    {
        return static::$conn->lastInsertId();
    }
}