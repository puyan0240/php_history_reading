<?php
    require_once './common/DbManager.php';
    require_once './common/Encode.php';

    $tblName = "history_book_tbl";

    
    //検索結果
    {
        $strSearchResult = "";
        $format = "
        <tr>
            <td><button onclick=\"location.href='branch.php?edit_type=disp&idx=%d'\">閲覧</button></td>
            <td>%d</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%d</td>
        </tr>";

        if (isset($_POST['bt_search'])) {
            $author    = e($_POST['author']);
            $publisher = e($_POST['publisher']);

            $where = "";
            if (mb_strlen($author))
                $where = "author like '%".$author."%'";
            if (mb_strlen($publisher)) {
                if (mb_strlen($where))
                    $where .= " && ";
                $where = "publisher like '%".$publisher."%'";
            }

            //DB問い合わせ (※検索条件がある場合のみ)
            if (mb_strlen($where)) {
                $ret = readTbl($tblName, $where, 'ORDER BY date');
                if ($ret != FALSE) {
                    $count = 1; //Index値
                    foreach ($ret as $value) {
                        //HTML作成
                        $strSearchResult .= sprintf($format, (int)$value['idx'], $count,
                                                    $value['date'], $value['title'], $value['author'], 
                                                    $value['publisher'], $value['recommend']);
                        $count += 1;
                    }
                }    
            }
        }       
    }


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
        <?php echo $strSearchResult; ?>

    </table>


    <p>年度毎の件数</p>
    <table>
        <?php echo $strNumberOfEntry; ?>
    </table>
    <a href="index.php">戻る</a>
</body>
</html>