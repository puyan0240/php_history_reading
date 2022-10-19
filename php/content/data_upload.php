<?php

    include('./vendor/autoload.php');
  
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

    $file = $_FILES['upload_file'];

    #var_dump($file);

    $result = 'アップロードが失敗しました';

    if (!empty($file['tmp_name'])) { //アップロードファイルあり
        $filepath = $file["tmp_name"];
        echo $filepath;
    
        $storeDir = '/tmp/'; #apache上です
        $filepath = $storeDir.$file['name'];
        echo $filepath;
        move_uploaded_file($file['tmp_name'], $filepath);

        try {
            $reader = new XlsxReader();
            $spreadsheet = $reader->load($filepath); // ファイル名を指定
            #$sheet = $spreadsheet->getSheetByName('test1'); // 読み込むシートを指定
    
            $sheetCount = $spreadsheet->getSheetCount();    //シート数取得
            echo "シート数".$sheetCount."<br>";

            for ($i =0; $i < $sheetCount; $i ++) {
                $sheet = $spreadsheet->getSheet($i);
                $title = $sheet->getTitle();    #Sheet名取得
                echo "title:".$title."<br>";
                echo "------".$i."<br>";
    
                $dataName = ['idx', 'date','title','author','publisher','recommend','comment'];
                
                foreach ($sheet->getRowIterator() as $row_num => $row) {
                    $sheetData = [];

                    foreach($sheet->getColumnIterator() as $column) {
                        $cellData = $sheet->getCell($column->getColumnIndex() . $row->getRowIndex())->getValue();
                        if (!empty($cellData))
                            $sheetData[] = $cellData;
                        #echo $sheet->getCell($column->getColumnIndex() . $row->getRowIndex())->getValue().PHP_EOL ;
                    }
                    if (count($sheetData) == 0)
                        continue;   //空行はスキップ
                    if (strcmp($sheetData[0], 'No.') == 0)
                        continue;   //先頭のタイトル行はスキップ

                    foreach ($sheetData as $j => $cellData) {
                        if ($j > 0)
                            echo $dataName[$j].":".$cellData.",";
                        $result = 'アップロードが成功しました';
                    }
                    #var_dump($sheetData);
                }   
            }
        }
        catch (Exception $e) {
            die("ロードエラー : {$e->getMessage()}");
        }
    
        unlink($filepath);  #ファイルを削除  
    } else { //アップロードファイルなし
        //exit();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>保存データのアップロード</title>
</head>
<body>
    <p><?php echo $result; ?></p>
    <a href="index.php">戻る</a>
</body>
</html>