<?php

require_once __DIR__ . "/config.php";

class Database
{

    public static $connection;

    public static function setUpConnection()
    {

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        }
    }

    public static function iud($q)
    {
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
