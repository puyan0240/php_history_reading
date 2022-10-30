<?php
    require_once './common/DbManager.php';

    //var_dump($_POST);

    $tblName = "history_book_tbl";

    //年度毎の件数をTable表示
    {
        $latestYear = 2019; //一番古い年

        $format = "
        <tr>
            <td>%d 年</td><td>%d 件</td>
        </tr>";
        $strNumberOfEntry = "";

        $year = date('Y');
        while ($year >= $latestYear) {
            $where = "date like '%".$year."%'";
            $count = getNumberOfEntryTbl($tblName, $where, "*");

            $strNumberOfEntry .= sprintf($format, $year, $count);
            $year --;
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索</title>
</head>
<body>
    <p>検索</p>
    <form action="" method="POST">
        <table>
            <tr>
                <td>著者</td><td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>出版社</td><td><input type="text" name="publisher"></td>
            </tr>
        </table>
        <input type="reset" value="取消">
        <input type="submit" name="bt_search" value="検索">
    </form>

    <p>年度毎の件数</p>
    <table>
        <?php echo $strNumberOfEntry; ?>
    </table>
    <a href="index.php">戻る</a>
</body>
</html>