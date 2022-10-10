<?php
    require_once './common/DbManager.php';

    $tblName = "history_book_tbl";

    $outKeyValue = [];

    $format = "
        <tr>
            <td>%d</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%d</td>
        </tr>";
    $strTbl = "";

    //DB TABLEから読み出し
    $ret = getFromTbl($tblName, $outKeyValue);
    if ($ret != FALSE) {

        //HTML作成
        $count = 1;
        foreach ($ret as $value) {
            $strTbl .= sprintf($format, $count, $value['date'], $value['title'], $value['author'], $value['publisher'], $value['recommend'], $value['comment']);
            $count += 1;
        }
    }
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
        <?php echo $strTbl; ?>

    </table>
</body>
</html>