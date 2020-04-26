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
        }
    }

    function edit()
    {
        if (empty($_POST)) {
            $GLOBALS["view"]["title"] = "編輯留言";
            include_once "Views/header.php";
            include_once "Views/Comment/edit.php";
            include_once "Views/footer.php";
        }
    }

    function delete()
    {
        if (empty($_POST)) {
            $GLOBALS["view"]["title"] = "刪除留言";
            include_once "Views/header.php";
            include_once "Views/Comment/delete.php";
            include_once "Views/footer.php";
        }
    }
}
