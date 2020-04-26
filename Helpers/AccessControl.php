<?php
if (isset(
        $GLOBALS["website"],
        $GLOBALS["website"]["title"]
    ) == false) {
    exit("Access has been forbidden.");
}

if (isset(
        $GLOBALS["database"],
        $GLOBALS["database"]["host"],
        $GLOBALS["database"]["port"],
        $GLOBALS["database"]["name"],
        $GLOBALS["database"]["username"],
        $GLOBALS["database"]["password"]
    ) === false) {
    exit("No correct database configuration given.");
}
