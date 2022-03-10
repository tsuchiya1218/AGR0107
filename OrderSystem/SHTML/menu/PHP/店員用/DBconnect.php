<?php
try{
    //学籍番号は自分のものに変更すること
    $dsn = 'sqlsrv:server=10.42.129.3;database=20jy0119';
    $user = '20jy0119';
    $password = '20jy0119';
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//print "<br>\n";
} catch (Exception $e){
    print 'データベースへのアクセスにエラーが発生しました。';
    //print $e;
    exit();
}
?>