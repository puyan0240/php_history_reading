<?php
    require_once './common/Encode.php';
    require_once './common/DbManager.php';

    $tblName = "history_book_tbl";
    $keyValue = [];
    //DB TABLEの要素名リスト
    $keyName = ['date','title','author','publisher','recommend','comment'];

    //DB TABLEの 要素名:値 になるよう連想配列を作成
    foreach ($keyName as $key) {
        if ($key == 'date') {
            $keyValue[$key] = date('Y-m-d');
        } elseif ($key == 'recommend') {
            $keyValue[$key] = (int)e($_POST[$key]);
        } else {
            $keyValue[$key] = e($_POST[$key]);
        }
    }
    
    //DB TABLEへ書き込み
    if (insertDb($tblName, $keyValue) == TRUE) {
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