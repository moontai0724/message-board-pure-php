<?php defined("APP_URI") or exit("Access forbidden."); ?>
<h1 style="text-align: center;">新增留言</h1>
<form style="max-width: 600px; margin: 0 auto;" method="post" action="?action=add">
    <div style="margin: 10px;">
        <label for="name">姓名/綽號（留空則為匿名）：</label>
        <input type="text" name="name" maxlength="20">
    </div>
    <div style="margin: 10px;">
        <label for="content"><span style="color: red;" title="必填">*</span>留言內容：</label><br>
        <textarea cols="80" rows="20" name="content" required></textarea>
    </div>
    <div style="margin: 10px;">
        <label for="password">留言密碼：</label>
        <input type="password" name="password">
        <div style="margin: 10px;">
            <div>要編輯或是刪除時需填入此處的留言密碼。</div>
            <div>若留空，則留言後無法編輯或刪除。</div>
        </div>
    </div>
    <div>
        <button type="submit">送出</button>
        <button type="button" onClick="window.location='<?= APP_URI ?>';">取消</button>
    </div>
</form>
