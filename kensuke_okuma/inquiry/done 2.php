<?php
session_start();
require_once('util.inc.php');

unset($_SESSION['token']);

mb_language('ja');
mb_internal_encoding('UTF-8');

$to = h($_POST['mail']);
$title = 'お問い合わせ内容の件';
$headers = 'From: info@xxx.com';
$body =
    h($_POST['name']) . '様' . PHP_EOL .
    'この度はお問い合わせ頂きまして、有り難う御座います。' . PHP_EOL .
    '以下の内容をメールにてお問い合わせがございました。' . PHP_EOL . PHP_EOL .
    '【お名前】' . h($_POST['name']) . PHP_EOL .
    '【フリガナ】' . h($_POST['kana']) . PHP_EOL .
    '【電話番号】' . h($_POST['tell']) . PHP_EOL .
    '【職業】' . h($_POST['job']) . PHP_EOL .
    '【メールアドレス】' . h($_POST['mail']) . PHP_EOL .
    '【ご要望内容】' . h($_POST['inquiry']) . PHP_EOL .

    'お問い合わせ内容に関しまして、3営業日以内にご回答させていただきます。' . PHP_EOL .
    '本メールに心当たりのない場合はinfo@xxx.comまでご連絡ください。' . PHP_EOL .
    '※こちらのご案内は送信専用です。' . PHP_EOL .
    '*********************************************' . PHP_EOL .
    '運営会社名 : Sengoku　Library' . PHP_EOL .
    '担当 : 大熊　健介（おおくま　けんすけ）' . PHP_EOL .
    '問合せ先 : 000-0000-0000' . PHP_EOL .
    '*********************************************';

if (mb_send_mail($to, $title, $body, $headers)) {
    $msg = '内容を確認の上、回答致します。しばらくお待ちください。';
} else {
    $msg = '送信されませんでした。お手数ですが、℡. 000-0000-0000 までご連絡ください。';
}
?>
<!-- ヘッター部分/ -->
<?php require_once('header.php'); ?>
<!-- メイン部分/ -->
<top class="top_return">
    <section class="menu"><a href="../index.html"><img src="img/top_return.png" alt="TOPへ戻る"></a></section>
</top>
<h3 class=contact-title>お問い合わせフォーム完了</h3>
<main>
    <section class = "nav-list03">
        <section class="icon"><img src="img/hideyoshi_kamon.png" alt="豊臣秀吉"></section>
    </section>
    <p class="msg"><?=h($msg)?></p>
    <section class = "nav-list04">
        <section class="icon"><img src="img/nobunaga_kamon.png" alt="織田信長"></section>
        <section class="icon"><img src="img/ieyasu_kamon.png" alt="徳川家康"></section>
    </section>
</main>
<!-- フッター部分/ -->
<?php require_once('footer.php'); ?>
