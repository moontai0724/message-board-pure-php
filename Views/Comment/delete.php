<?php defined("APP_URI") or exit("Access forbidden."); ?>
<h1 style="text-align: center;">刪除留言</h1>
<h3 style="text-align: center; color: lightcoral;">您確定要刪除此則留言？</h3>
<form style="max-width: 600px; margin: 0 auto;" method="post" action="?action=delete">
    <input type="number" name="id" value="<?= $GLOBALS["view"]["comment"]["id"] ?>" hidden>
    <?php include "Views/Components/comment.php"; ?>
    <div style="margin: 10px;">
        <label for="password">留言密碼：</label>
        <input type="password" name="password">
    </div>
    <div>
        <button type="submit">確定</button>
        <button type="button" onClick="window.location='<?= APP_URI ?>';">取消</button>
    </div>
</form>
