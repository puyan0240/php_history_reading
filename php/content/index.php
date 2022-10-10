<?php
    require_once './common/DbManager.php';

    $tblName = "history_book_tbl";

    $outKeyValue = [];

    //DB TABLEから読み出し
    $result = getFromTbl($tblName, $outKeyValue);

    echo $result;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="branch.php" method="post">
        <input type="submit" name="bt_add" value="新規登録">
        <input type="submit" name="bt_data" value="データ">
    </form>

    <table>
        <tr>
            <th>No.</th>
            <th>日付</th>
            <th>タイトル</th>
            <th>著者</th>
            <th>出版社</th>
            <th>評価</th>
        </tr>
    </table>
</body>
</html>