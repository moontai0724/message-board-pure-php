<?php defined("APP_URI") or exit("Access forbidden."); ?>
<div id="<?= $GLOBALS["view"]["comment"]["id"] ?>" class="comment" style="border: 1px solid; margin: 10px; padding: 10px; border-radius: 10px;">
    <div class="header">
        <span class="author" title="留言者"><?= htmlspecialchars($GLOBALS["view"]["comment"]["name"], ENT_HTML5, "UTF-8") ?></span>
        於
        <span class="created_at" title="留言時間"><?= $GLOBALS["view"]["comment"]["created_at"] ?></span>
        說：
    </div>
    <div class="content"><?= htmlspecialchars($GLOBALS["view"]["comment"]["content"], ENT_HTML5, "UTF-8") ?></div>
    <div class="actions">
        <a href="<?= constant("APP_URI") ?>/?action=edit&id=<?= $GLOBALS["view"]["comment"]["id"] ?>">編輯</a>
        <a href="<?= constant("APP_URI") ?>/?action=delete&id=<?= $GLOBALS["view"]["comment"]["id"] ?>">刪除</a>
    </div>
</div>
