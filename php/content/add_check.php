<?php
    require_once './common/Encode.php';

    $title     = e($_POST['title']);
    $author    = e($_POST['author']);
    $publisher = e($_POST['publisher']);
    $recommend = e($_POST['recommend']);
    $comment   = e($_POST['comment']);

    if ((mb_strlen($title) == 0)  ||
        (mb_strlen($author) == 0) ||
        (mb_strlen($publisher) == 0)) {
        exit();
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録確認</title>
</head>
<body>
    <a href="index.php">戻る</a>
</body>
</html>