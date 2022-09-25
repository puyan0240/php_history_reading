<?php
function getDb($dbname, $host) : PDO
{
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
        $dsn = sprintf($format, $dbname, $host);

        $db = new PDO($dsn, $user, $passwd);
        return $db;
    }
    catch (PDOException $e)
    {
        die("接続エラー : {$e->getMessage()}");
    }
}
?>