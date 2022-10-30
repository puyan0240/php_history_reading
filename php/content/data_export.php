<?php
    require_once './common/DbManager.php';
    include('./vendor/autoload.php');
  
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    //エクスポートするファイル名
    $file_name = "data_backup.xlsx";


    //DB TABLEから読み出し(全件取得)
    $tblName = "history_book_tbl";
    $ret = readTbl($tblName, NULL, 'ORDER BY date');
    if ($ret == FALSE) {
        //失敗
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit();
    }


    //Spreadsheetオブジェクト作成
    $objSpreadsheet = new Spreadsheet();

    //シート設定
    $objSheet = $objSpreadsheet->getActiveSheet();
    
    //1行目作成
    $itemTbl = ['No.','Date', 'Title', 'Author', 'Publisher', '★', 'Comment'];
    $col = 'A';
    $row = 1;
    foreach ($itemTbl as $Name) {
        $cell = $col.$row;
        $objSheet->setCellValue($cell, $Name);    

        $col ++;    //次のColumへ
    }

    //DB 結果出力を２行目以降に
    $count = 1;
    foreach ($ret as $line) {
        $col = 'A';
        $row ++;
        foreach ($line as $key => $value) {
            $cell = $col.$row;  //セル指定

            if ($key == 'idx') {
                $objSheet->setCellValue($cell, $count);
            }
            elseif ($key == 'date') {
                //Excelのセルの表示形式を日付に変更する
                $objSheet->getStyle($cell)->getNumberFormat()->setFormatCode('yyyy/mm/dd');

                //Execlの日付型に変化する（そうしないと文字列で書き込まれる）
                $value = \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($value);
                $objSheet->setCellValue($cell, $value);
            }
            else {
                $objSheet->setCellValue($cell, $value);
            }          
            $col ++;
        }
        $count ++;
    }

    //ブラウザへの指定
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment;filename={$file_name}");
    header("Cache-Control: max-age=0");

    //XLSX形式オブジェクト生成
    $objWriter = new Xlsx($objSpreadsheet);

    //ファイル書き込み
    $objWriter->save('php://output');

    exit();
?>