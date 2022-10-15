<?php
    require_once './common/Encode.php';
    require_once './common/DbManager.php';

    $result = "失敗しました。";
    $tblName = "history_book_tbl";

    //DB TABLEの要素名リスト
    $paramKeyName = ['idx'];
    $paramKeyValue = [];

    //DB TABLEの 要素名:値 になるよう連想配列を作成
    foreach ($paramKeyName as $key) {
        $paramKeyValue[$key] = e($_POST[$key]);
    }

    //DB TBLを更新
    if (deleteTbl($tblName, $paramKeyValue) == TRUE) {
        $result = "削除しました。";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除完了</title>
</head>
<body>
    <p><?php echo $result; ?></p>
    <a href="index.php">戻る</a>
</body>
</html>