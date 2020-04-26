<?php

namespace moontai0724\messageboard\Controller;

include_once "Core/Controller.php";
include_once "Models/Comment.php";

use moontai0724\messageboard\Core\Controller;

class Comment extends Controller
{
    private $comment_model;

    function __construct()
    {
        parent::__construct();
        $this->comment_model = new \moontai0724\messageboard\Model\Comment();
    }

    function list()
    {
        $GLOBALS["view"]["title"] = "留言列表";
        $GLOBALS["view"]["comments"] = $this->comment_model->list();
        include_once "Views/header.php";
        include_once "Views/Comment/list.php";
        include_once "Views/footer.php";
    }

    function add()
    {
        if (empty($_POST)) {
            $GLOBALS["view"]["title"] = "新增留言";
            include_once "Views/header.php";
            include_once "Views/Comment/add.php";
            include_once "Views/footer.php";
        } else if (isset(
            $_POST["name"],
            $_POST["password"],
            $_POST["content"]
        )) {
            $this->comment_model->add(
                empty($_POST["name"]) ? "匿名" : $_POST["name"],
                empty($_POST["password"]) ? null : password_hash($_POST["password"], PASSWORD_BCRYPT),
                $_POST["content"]
            );
        }
    }

    function edit()
    {
        if (empty($_POST) && isset($_GET["id"])) {
            $GLOBALS["view"]["title"] = "編輯留言";
            $GLOBALS["view"]["comment"] = $this->comment_model->get($_GET["id"]);
            if ($GLOBALS["view"]["comment"] === FALSE) {
                header("Location: " . APP_URI);
            }
            include_once "Views/header.php";
            include_once "Views/Comment/edit.php";
            include_once "Views/footer.php";
        } else if (isset(
            $_POST["id"],
            $_POST["name"],
            $_POST["password"],
            $_POST["content"]
        )) {
            $comment = $this->comment_model->get($_POST["id"]);
            if (password_verify($_POST["password"], $comment["password"]) === FALSE) {
                exit("Password incorrect!");
            }
            $this->comment_model->update(
                $_POST["id"],
                empty($_POST["name"]) ? "匿名" : $_POST["name"],
                $_POST["content"]
            );
        }
    }

    function delete()
    {
        if (empty($_POST) && isset($_GET["id"])) {
            $GLOBALS["view"]["title"] = "刪除留言";
            $GLOBALS["view"]["comment"] = $this->comment_model->get($_GET["id"]);
            include_once "Views/header.php";
            include_once "Views/Comment/delete.php";
            include_once "Views/footer.php";
        } else if (isset(
            $_POST["id"],
            $_POST["password"],
        )) {
            $comment = $this->comment_model->get($_POST["id"]);
            if (password_verify($_POST["password"], $comment["password"]) === FALSE) {
                exit("Password incorrect!");
            }
            $this->comment_model->delete($_POST["id"]);
        }
    }
}
