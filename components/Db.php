<?php

namespace components;

use Exception;
use SQLite3;
use Throwable;

class Db
{
    /**
     * @throws Exception
     */
    public static function getConnection(): SQLite3
    {
        try {
            $db_file = 'src/sql/db.sqlite'; // Replace with the path to your SQLite database file

            return new SQLite3($db_file);
        } catch (Throwable $e) {
            throw new Exception('Database connection error: ' . $e->getMessage());
        }
    }
}
