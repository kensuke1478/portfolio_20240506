<?php
require_once('util.inc.php');

$_SESSION['token'] = getToken();

if (empty($_POST['name'])) {
    $error['name'] = '※名前を入力してください';
}

if (empty($_POST['kana'])) {
    $error['kana'] = '※フリガナを入力してください';
} elseif (!preg_match('/^[ァ-ヶ]+$/u', $_POST['kana'])) {
    $error['kana'] = '※全角カタカナで入力してください。';
}

if (empty($_POST['tell'])) {
    $error['tell'] = '※電話番号を入力してください';
}

if (empty($_POST['mail'])) {
    $error['mail'] = '※メールアドレスを入力してください';
}
if (empty($_POST['mail_conf'])) {
    $error['mail_conf'] = '※メールアドレス確認を入力してください';
} elseif ($_POST['mail'] !== $_POST['mail_conf']) {
    $error['mail_conf'] = '※メールアドレスと確認用メールアドレスが一致していません';
}

if (empty($_POST['inquiry'])) {
    $error['inquiry'] = '※ご要望内容を入力してください';
} elseif (mb_strlen($_POST['inquiry']) < 20) {
    $error['inquiry'] = '※ご要望内容は20文字以上で入力してください。';
}
if (isset($error)) {
    require_once('contact.php');
    exit;
}
?>
<!-- ヘッター部分/ -->
<?php require_once('header.php'); ?>
<!-- メイン部分/ -->
<top class="top_return">
    <section class="menu"><a href="../index.html"><img src="img/top_return.png" alt="TOPへ戻る"></a></section>
</top>
<h2 class=contact-title>お問い合わせフォーム確認</h2>
<form action="done.php" method="post" novalidate>
<table class="CF7_table">
    <tr>
    <th><span class="CF7_req">お名前</span> </th>
    <td><input class="confirm-text" type="text" name="name" id="'inputName" value="<?= isset($_POST['name']) ? h($_POST['name']) : '' ?>">
    </tr>
    <th><span class="CF7_req">フリガナ</span></th>
    <td><input class="confirm-text" type="text" name="kana" id="'inputKame" value="<?= isset($_POST['kana']) ? h($_POST['kana']) : '' ?>">
    <tr>
    <th><span class="CF7_req">電話番号</span></th>
    <td><input class="confirm-text" type="text" name="tell" value="<?= isset($_POST['tell']) ? h($_POST['tell']) : '' ?>">
    </tr>
    <tr>
    <th><span class="CF7_req">職業</span></th>
    <td><input class="confirm-text" type="text" name="job" value="<?= isset($_POST['job']) ? h($_POST['job']) : '' ?>">
    </tr>
    <tr>
    <th><span class="CF7_req">メールアドレス</span></th>
    <td><input class="confirm-text" type="text" name="mail" value="<?= isset($_POST['mail']) ? h($_POST['mail']) : '' ?>">
    </tr>
    <tr>
    <th><span class="CF7_req">確認用メールアドレス</span></th>
    <td><input class="confirm-text" type = "mail" name="mail_conf" value="<?=isset($_POST['mail_conf']) ? h($_POST['mail_conf']) : ''?>" >
    </tr>
    <th><span class="CF7_req">ご要望</span></th>
    <td><textarea class="textarea" name="inquiry"><?= isset($_POST['inquiry']) ? h($_POST['inquiry']) : '' ?></textarea>
</table>
<div class = "confirm">
<input type="hidden" name="token" value="<?=h($_SESSION['token'])?>">
    <td><input class="done" name="confirm" type="submit" value="送信" formaction="done.php"></td>
    <td><input class="register" name="confirm" type="submit" value="戻る" formaction="contact.php"></td>
</div>
</form>
<!-- フッター部分/ -->
<?php require_once('footer.php'); ?>
