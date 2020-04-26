<?php

namespace moontai0724\messageboard\Core;

use PDO;
use PDOException;

include_once "Helpers/AccessControl.php";

class Database
{
    protected $database;

    function __construct()
    {
        try {
            $this->database = new PDO(
                "mysql:host=" . $GLOBALS["database"]["host"] . ";port=" . $GLOBALS["database"]["port"] . ";dbname=" . $GLOBALS["database"]["name"] . ";charset=utf8;",
                $GLOBALS["database"]["username"],
                $GLOBALS["database"]["password"]
            );
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            exit("Connection failed: " . $exception->getMessage());
        }
    }
}
