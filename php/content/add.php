<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
</head>
<body>
    <form action="add_confirm.php" method="POST">
        <div>
            <p>新規登録</p>
            <table>
                <tr>
                    <td>タイトル:</td>
                    <td><input type="text" name="title" required></td>
                </tr>
                <tr>
                    <td>著者:</td>
                    <td><input type="text" name="author" required></td>
                </tr>
                <tr>
                    <td>出版社:</td>
                    <td><input type="text" name="publisher" required></td>
                </tr>
                <tr>
                    <td>評価:</td>
                    <td>
                        <select name="recommend">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>コメント:</td>
                    <td><input type="text" name="comment"></td>
                </tr>
            </table>

            <input type="reset" value="取消">
            <input type="submit" value="登録確認">
        </div>
    </form>
    <div>
        <a href="index.php">戻る</a>
    </div>
</body>
</html>