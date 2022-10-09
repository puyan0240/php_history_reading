<?php
function getDb($dbName, $host) : PDO {
    //環境変数(.env)からユーザーIDとパスワード取得
    {
        require dirname(__FILE__).'/../vendor/autoload.php'; //vendorディレクトリの階層を指定する
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/..'); //.envの階層を指定する
        $dotenv->load();

        $user=$_ENV['USER_ID'];
        $passwd=$_ENV['USER_PASS'];
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
        //die("接続エラー : {$e->getMessage()}");
        return null;
    }
}

function insertDb($dbName, $host, $tblName, $keyValue) {

    $db = getDb($dbName, $host);
    if ($db != null) {
        $str_tblElement = "";
        $str_bindName = "";

        foreach ($keyValue as $key => $value) {
            $str_tblElement .= ($key.", ");
            $str_bindName .= (":".$key.", ");
        }
        $str_tblElement = rtrim($str_tblElement, ", ");
        $str_bindName = rtrim($str_bindName, ", ");
 
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
        }
        catch (PDOException $e) {
            echo "err:".$e->getMessage()."<br>";
            var_dump($db->errorInfo());
        }

        $db = null;
        return TRUE;
    } else {
        return FALSE;
    }
}
?>