<?php defined("APP_URI") or exit("Access forbidden."); ?>
    <div style="text-align: center;"><a href="<?= constant("APP_URI") ?>/?action=add">立即發表你的想法！</a></div>
<?php
if (is_array($GLOBALS["view"]["comments"]) && count($GLOBALS["view"]["comments"]) > 0) {
    foreach ($GLOBALS["view"]["comments"] as $comment) {
        $GLOBALS["view"]["comment"] = $comment;
        include "Views/Components/comment.php";
    }
} else {
    echo "<div style=\"text-align: center;\">目前沒有任何留言！</div>";
}
