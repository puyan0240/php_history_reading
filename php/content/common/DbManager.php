<?php

#-----------------------------------------------------------
# DBアクセス関数
#-----------------------------------------------------------
function getDb() : PDO {
    //環境変数(.env)からユーザーIDとパスワード取得
    {
        require dirname(__FILE__).'/../vendor/autoload.php'; //vendorディレクトリの階層を指定する
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..'); //.envの階層を指定する
        $dotenv->load();

        $dbName = $_ENV['DB_NAME'];     //DB名
        $host   = $_ENV['DB_HOST'];     //ホスト
        $user   = $_ENV['USER_ID'];     //ユーザー名
        $passwd = $_ENV['USER_PASS'];   //ユーザーパスワード
    }

   //データベースへのアクセス
    try
    {
        $format = 'mysql:dbname=%s; host=%s; charset=utf8';
        $dsn = sprintf($format, $dbName, $host);

        $db = new PDO($dsn, $user, $passwd);
        return $db;
    }
    catch (PDOException $e)
    {
        echo "接続エラー:".$e->getMessage();
        return null;
    }
}


#-----------------------------------------------------------
# TBLから取得 (SELECT)
#-----------------------------------------------------------
function getFromTbl($tblName) {

    $result = FALSE;
    $outValue = [];

    //DB接続
    $db = getDb();
    if ($db != null) {

        //TBLから取得
        try {
            $format = 'SELECT * FROM %s WHERE 1';
            $strSql = sprintf($format, $tblName);
            $stmt = $db->prepare($strSql);
            $stmt->execute();

            $result = TRUE;
        }
        catch (PDOException $e) {

            $result = FALSE;
        }

        //DB切断
        $db = null;

        //取得結果を順番に取り出す
        if ($result == TRUE) {
            while (TRUE) {
                $rec = $stmt->fetch(PDO::FETCH_ASSOC); //連想配列で
                if ($rec == FALSE)
                    break; //終了

                $outValue[] = $rec; //連想配列型の2次元配列で結果を格納
            }
        }
    }

    if ($result == TRUE)
        return $outValue;
    else
        return FALSE;
}



#-----------------------------------------------------------
# テーブルに新規追加 (INSERT INTO)
#-----------------------------------------------------------
function insertDb($tblName, $keyValue) {

    $result = FALSE;

    //DBアクセス
    $db = getDb();
    if ($db != null) {

        $str_tblElement = "";
        $str_bindName = "";

        //引数の連想配列は、テーブルの 要素名:値 になっている
        foreach ($keyValue as $key => $value) {
            $str_tblElement .= ($key.", ");
            $str_bindName .= (":".$key.", ");
        }
        $str_tblElement = rtrim($str_tblElement, ", ");
        $str_bindName = rtrim($str_bindName, ", ");
 
        //SQLのINSERT INTOを行う
        try {
            $format = 'INSERT INTO %s(%s) VALUES(%s)';
            $str_sql = sprintf($format, $tblName, $str_tblElement, $str_bindName);
            $stt = $db->prepare($str_sql);
 
            $format = ':%s';
            foreach ($keyValue as $key => $value) {
                $str_bindName = sprintf($format, $key);
                $stt->bindValue($str_bindName, $value);
            }
            $stt->execute();

            $result = TRUE;
        }
        catch (PDOException $e) {
            echo "err:".$e->getMessage()."<br>";

            $result = FALSE;
        }

        //DB解放
        $db = null;
    }

    return $result;
}
?>