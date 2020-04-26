<?php

namespace moontai0724\messageboard\Model;

use moontai0724\messageboard\Core\Database;
use PDO;
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

    function list()
    {
        try {
            $query = $this->database->prepare("SELECT * FROM `comments` ORDER BY `created_at` DESC");
            $query->execute();
            return $query->fetchALL(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Execution failed: " . $exception->getMessage();
        }
    }

    function get($id)
    {
        try {
            $query = $this->database->prepare("SELECT * FROM `comments` WHERE `id` = :id");
            $query->execute(array(":id" => $id));
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Execution failed: " . $exception->getMessage();
        }
    }

    function add($name, $password, $content)
    {
        try {
            $sql = "INSERT INTO `comments` (name, password, content) VALUES(:name, :password, :content)";
            $param = array(":name" => $name, ":password" => $password, ":content" => $content);
            $query = $this->database->prepare($sql);
            $query->execute($param);
        } catch (PDOException $exception) {
            echo "Execution failed: " . $exception->getMessage();
        }
    }

    function update($id, $name, $content)
    {
        try {
            $sql = "UPDATE `comments` SET `name` = :name, `content` = :content WHERE `id` = :id";
            $param = array(":id" => $id, ":name" => $name, ":content" => $content);
            $query = $this->database->prepare($sql);
            $query->execute($param);
        } catch (PDOException $exception) {
            echo "Execution failed: " . $exception->getMessage();
        }
    }
}
