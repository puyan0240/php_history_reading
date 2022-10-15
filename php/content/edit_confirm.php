<?php
    require_once './common/Encode.php';

    $idx       = e($_POST['idx']);
    $date      = e($_POST['date']);
    $title     = e($_POST['title']);
    $author    = e($_POST['author']);
    $publisher = e($_POST['publisher']);
    $recommend = e($_POST['recommend']);
    $comment   = e($_POST['comment']);

    if ((mb_strlen($title) == 0)  ||
        (mb_strlen($author) == 0) ||
        (mb_strlen($publisher) == 0)) {
        //exit();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新確認</title>
</head>
<body>
    <form action="edit_done.php" method="POST">
        <div>
            <p>更新確認</p>
            <table>
                <tr>
                    <td>日付</td>
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

            <input type="hidden" name="idx" value="<?php echo $idx; ?>">
            <input type="hidden" name="date" value="<?php echo $date; ?>">
            <input type="hidden" name="title" value="<?php echo $title; ?>">
            <input type="hidden" name="author" value="<?php echo $author;?>">
            <input type="hidden" name="publisher" value="<?php echo $publisher;?>">
            <input type="hidden" name="recommend" value="<?php echo $recommend;?>">
            <input type="hidden" name="comment" value="<?php echo $comment; ?>">

            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="更新する">
        </div>
    </form>
</body>
</html>