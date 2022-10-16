<?php
    require_once './common/DbManager.php';

    $result = "失敗しました。";
    $tblName = "history_book_tbl";

    //DB TBLを更新
    if (deleteTbl($tblName, NULL) == TRUE) {
        $result = "全削除しました。";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>全削除完了</title>
</head>
<body>
    <p><?php echo $result; ?></p>
    <a href="index.php">戻る</a>
</body>
</html>