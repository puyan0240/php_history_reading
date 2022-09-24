<?php
function getDb($dbname, $host, $user, $passwd) : PDO
{
   //データベースへのアクセス
    try
    {
        $format = 'mysql:dbname=%s; host=%s; charset=utf8';
        $dsn = sprintf($format, $dbname, $host);
        #echo $dsn;
        #echo $user;
        #echo $passwd;

        $db = new PDO($dsn, $user, $passwd);
        return $db;
    }
    catch (PDOException $e)
    {
        die("接続エラー : {$e->getMessage()}");
    }
}
?>