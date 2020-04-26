<?php

namespace moontai0724\messageboard\Core;

class Controller
{
    function __construct()
    {
    }

    function __destruct()
    {
        if (empty($_POST) === false) {
            header("Location: " . APP_URI);
        }
    }
}