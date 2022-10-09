<?php
    require_once './common/Encode.php';

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
    <title>新規登録確認</title>
</head>
<body>
    <form action="add_done.php" method="POST">
        <div>
            <p>登録確認</p>
            <table>
                <tr>
                    <td>タイトル:</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>" readonly></td>
                </tr>
                <tr>
                    <td>著者:</td>
                    <td><input type="text" name="author" value="<?php echo $author;?>" readonly></td>
                </tr>
                <tr>
                    <td>出版社:</td>
                    <td><input type="text" name="publisher" value="<?php echo $publisher;?>" readonly></td>
                </tr>
                <tr>
                    <td>評価:</td>
                    <td><?php echo $recommend; ?></td>
                </tr>
                <tr>
                    <td>コメント:</td>
                    <td><input type="text" name="comment" value="<?php echo $comment; ?>" readonly></td>
                </tr>
            </table>

            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="登録">
        </div>
    </form>
</body>
</html>