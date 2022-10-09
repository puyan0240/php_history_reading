<?php
    require_once './common/Encode.php';
    require_once './common/DbManager.php';

    $dbName ="history_book_db";
    $host = "db";
    $tblName = "history_book_tbl";
    $keyValue = [];
    $keyName = ['date','title','author','publisher','recommend','comment'];

    foreach ($keyName as $key) {
        if ($key == 'date') {
            $keyValue[$key] = date('Y-m-d');
        } elseif ($key == 'recommend') {
            $keyValue[$key] = (int)e($_POST[$key]);
        } else {
            $keyValue[$key] = e($_POST[$key]);
        }
    }
    //var_dump($keyValue);
    
    //
    if (insertDb($dbName, $host, $tblName, $keyValue) == TRUE) {
        $result = "登録成功しました。";
    } else {
        $result = "登録失敗しました。";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了</title>
</head>
<body>
    <p><?php echo $result; ?></p>
    <a href="index.php">戻る</a>
</body>
</html>