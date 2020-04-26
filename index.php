<?php

use moontai0724\messageboard\Controller\Comment;

define("APP_URI", $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]);

include_once "config.php";
include_once "Controllers/Comment.php";

$comment = new Comment();

$action = $_GET["action"] ?? "list";
$comment->$action();
