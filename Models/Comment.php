<?php

namespace moontai0724\messageboard\Model;

use moontai0724\messageboard\Core\Database;
use PDOException;

include_once "Core/Database.php";

class Comment extends Database
{
    function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    private function initialize()
    {
        try {
            $this->database->exec("CREATE TABLE IF NOT EXISTS `comments` (" .
                "`id` INT NOT NULL AUTO_INCREMENT COMMENT '流水號'," .
                "`name` VARCHAR(20) NOT NULL COMMENT '留言者'," .
                "`password` VARCHAR(60) NULL COMMENT '密碼'," .
                "`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '留言時間'," .
                "`edited_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '最後編輯時間'," .
                "`content` TEXT NOT NULL COMMENT '留言內容'," .
                "PRIMARY KEY (`id`)" .
                ") ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;");
        } catch (PDOException $exception) {
            echo "Execution failed: " . $exception->getMessage();
        }
    }
}
