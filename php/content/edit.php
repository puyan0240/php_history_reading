<?php
    require_once './common/DbManager.php';

    $tblName = "history_book_tbl";
    $title = $author = $publisher = $recommend = $comment = "";

    $idx = $_GET['idx'];
    //echo $idx;

    //DB TABLEから読み出し
    $param = 'idx ='.$idx;
    $ret = getFromTbl($tblName, $param);
    if ($ret != FALSE) {
        foreach ($ret as $value) {
            $idx       = $value['idx'];
            $date      = $value['date'];
            $title     = $value['title'];
            $author    = $value['author'];
            $publisher = $value['publisher'];
            $recommend = $value['recommend'];
            $comment   = $value['comment'];
        }
    }
    //select option の初期値
    $selectedTbl = [NULL,"","","","",""];
    $selectedTbl[$recommend] = "selected";
    //var_dump($selectedTbl);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集</title>
</head>
<body>
    <p><a href="index.php">戻る</a></p>
    <form action="edit_confirm.php" method="POST">
        <div>
            <p>編集</p>
            <input type="hidden" name="idx" value="<?php echo $idx; ?>">
            <table>
                <tr>
                    <td>日付</td>
                    <td><input type="text" name="date" value="<?php echo $date;?>"></td>
                </tr>
                <tr>
                    <td>タイトル:</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                    <td>著者:</td>
                    <td><input type="text" name="author" value="<?php echo $author;?>"></td>
                </tr>
                <tr>
                    <td>出版社:</td>
                    <td><input type="text" name="publisher" value="<?php echo $publisher;?>"></td>
                </tr>
                <tr>
                    <td>評価:</td>
                    <td>
                        <select name="recommend">
                            <option value="1" <?php echo $selectedTbl[1];?>>1</option>
                            <option value="2" <?php echo $selectedTbl[2];?>>2</option>
                            <option value="3" <?php echo $selectedTbl[3];?>>3</option>
                            <option value="4" <?php echo $selectedTbl[4];?>>4</option>
                            <option value="5" <?php echo $selectedTbl[5];?>>5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>コメント:</td>
                    <td><input type="text" name="comment" value="<?php echo $comment;?>"></td>
                </tr>
            </table>

            <input type="reset" value="取消">
            <input type="submit" value="更新確認へ">
        </div>
    </form>
</body>
</html>
