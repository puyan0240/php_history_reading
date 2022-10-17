<?php
    require_once './common/DbManager.php';

    $tblName = "history_book_tbl";

    $format = "
        <tr>
            <td><button onclick=\"location.href='branch.php?edit_type=disp&idx=%d'\">閲覧</button></td>
            <td>%d</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%d</td>
            <td><button onclick=\"location.href='branch.php?edit_type=edit&idx=%d'\">編集</button></td>
            <td><button onclick=\"location.href='branch.php?edit_type=clr&idx=%d'\">削除</button></td>
        </tr>";
    $strTbl = "";

    //DB TABLEから読み出し
    $ret = readTbl($tblName, NULL, 'ORDER BY date');
    if ($ret != FALSE) {

        //HTML作成
        $count = 1;
        foreach ($ret as $value) {
            $strTbl .= sprintf($format, (int)$value['idx'], $count, $value['date'], $value['title'], $value['author'], 
                                         $value['publisher'], $value['recommend'],
                                          (int)$value['idx'], (int)$value['idx']);
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
        <input type="submit" name="bt_data" value="データ管理">
    </form>

    <table>
        <tr>
            <th></th>
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