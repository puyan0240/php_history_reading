<?php
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ</title>
</head>
<body>
    <p><a href="index.php">戻る</a></p>
    <div>
        <p>データのアップロードする (Import)</p>
        <form action="data_upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="upload_file" value="">
            <input type="submit" name="bt_upload_file" value="Import">
        </form>
    </div>
    <div>
        <p>データを保存する (Export)</p>
        <form action="data_export.php" method="POST">
            <input type="submit" value="Export">
        </form>
    </div>
    <div>
        <p>全データを削除する</p>
        <form action="data_delete_confirm.php" method="POST">
            <input type="submit" value="全削除">
        </form>
    </div>
</body>
</html>
