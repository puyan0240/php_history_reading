<?php
    require_once './common/DbManager.php';
    include('./vendor/autoload.php');
  
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $tblName = "history_book_tbl";

    //DB TABLEから読み出し(全件取得)
    $ret = getFromTbl($tblName, NULL);
    if ($ret == FALSE) {
        //失敗
        exit();
    }

    //DB 結果出力
    foreach ($ret as $line) {
        foreach ($line as $key => $value) {
            //echo $key."=".$value."<br>";
        }
    }




/*
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


    //ブラウザへの指定
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="test.xlsx"');
    header('Cache-Control: max-age=0');

    //XLSX形式オブジェクト生成
    $objWriter = new Xlsx($objSpreadsheet);

    //ファイル書き込み
    $objWriter->save('php://output');
*/
    exit();
?>