<?php
if (!isset($_SESSION['token'])) {
    session_start();
}
require_once ('util.inc.php');

$_SESSION['token'] = getToken();
?>
<!-- ヘッター部分/ -->
<?php require_once('header.php'); ?>
<!-- メイン部分/ -->
<top class="top_return">
    <section class="menu"><a href="../index.html"><img src="img/top_return.png" alt="TOPへ戻る"></a></section>
</top>
    <h1 class=contact-title>お問い合わせフォーム</h1>
    <form action="confirm.php" class="validationForm" method="post" novalidate>
    <table class="CF7_table">
        <tr>
            <th><span class="CF7_req">お名前</span> </th>
            <p class="error"><?=isset($error['name']) ? $error['name'] : ''?></p>
            <td><input class="contact-text" type="text" name="name" id="'inputName" value="<?= isset($_POST['name']) ? h($_POST['name']) : '' ?>">
            </td>
        </tr>
        <th><span class="CF7_req">フリガナ</span></th>
        <p class="error"><?=isset($error['kana']) ? $error['kana'] : ''?></p>
        <td><input class="contact-text" type="text" name="kana" id="inputKana" value="<?= isset($_POST['kana']) ? h($_POST['kana']) : '' ?>">
        </td>
            <tr>
                <th><span class="CF7_req">電話番号</span></th>
                <p class="error"><?=isset($error['tell']) ? $error['tell'] : ''?></p>
                <td><input class="contact-text" type="text" name="tell" id = "inputTel" value="<?= isset($_POST['tell']) ? h($_POST['tell']) : '' ?>">
                </td>
            </tr>
            <tr>
                <th><span class="CF7_req">職業</span></th>
                <td><input class="contact-text" type="text" name="job" value="<?= isset($_POST['job']) ? h($_POST['job']) : '' ?>">
                </td>
            </tr>
            <tr>
                <th><span class="CF7_req">メールアドレス</span></th>
                <p class="error"><?=isset($error['mail']) ? $error['mail'] : ''?></p>
                <td><input class="contact-text" type="text" name="mail" value="<?= isset($_POST['mail']) ? h($_POST['mail']) : '' ?>">
                </td>
            </tr>
            <tr>
                <th><span class="CF7_req">確認用メールアドレス</span></th>
                <p class="error"><?=isset($error['mail_conf']) ? ($error['mail_conf']) : ''?></p>
                <td><input class="contact-text" type = "mail" name="mail_conf" value="<?=isset($_POST['mail_conf']) ? h($_POST['mail_conf']) : ''?>" >
                </td>
            </tr>
        <th><span class="CF7_req">ご要望</span></th>
        <p class="error"><?=isset($error['inquiry']) ? ($error['inquiry']) : ''?></p>
        <td><textarea class="textarea" name="inquiry"><?= isset($_POST['inquiry']) ? h($_POST['inquiry']) : '' ?></textarea>
        </td>
    </table>
    <input type="hidden" name="token" value="<?=h($_SESSION['token'])?>">
    <p><button class="CF7_btn" name="confirm"  type="submit"><img src="img/contact.png" value="確認画面"></button></p>
    </form>
<!-- フッター部分/ -->
<?php require_once('footer.php'); ?>
