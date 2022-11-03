<?php
    require_once './common/DbManager.php';

    $tblName = "history_book_tbl";
    $title = $author = $publisher = $recommend = $comment = "";

    $idx = $_GET['idx'];
    //echo $idx;

    //DB TABLEから読み出し
    $param = 'idx ='.$idx;
    $ret = readTbl($tblName, $param, NULL);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $date      = $value['date'];
            $title     = $value['title'];
            $author    = $value['author'];
            $publisher = $value['publisher'];
            $recommend = $value['recommend'];
            $comment   = $value['comment'];
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細表示</title>
</head>
<body>
    <p><a href="javascript:history.back()">戻る</a></p>

    <form action="add_done.php" method="POST">
        <div>
            <table>
                <tr>
                    <td>日付:</td>
                    <td><?php echo $date; ?></td>
                </tr>
                <tr>
                    <td>タイトル:</td>
                    <td><?php echo $title; ?></td>
                </tr>
                <tr>
                    <td>著者:</td>
                    <td><?php echo $author;?></td>
                </tr>
                <tr>
                    <td>出版社:</td>
                    <td><?php echo $publisher;?></td>
                </tr>
                <tr>
                    <td>評価:</td>
                    <td><?php echo $recommend; ?></td>
                </tr>
                <tr>
                    <td>コメント:</td>
                    <td><?php echo $comment; ?></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>