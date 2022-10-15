<?php
    include('./vendor/autoload.php');
  
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //Spreadsheetオブジェクト作成
    $objSpreadsheet = new Spreadsheet();

    //シート設定
    $objSheet = $objSpreadsheet->getActiveSheet();

    //[A1]セルに文字列
    $objSheet->setCellValue('A1', 'Spreadsheet');

    //[A2]セルに文字列
    $objSheet->setCellValue('A2', '123.56');

    //[A3]セルに文字列
    $objSheet->setCellValue('A3', 'True');


    //XLSX形式オブジェクト生成
    $objWriter = new Xlsx($objSpreadsheet);
    //ファイル書き込み
    $objWriter->save('test.xlsx');

    exit();
?>