<?php
require_once 'Dbconnect.php';
session_start();

?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会計完了画面</title>
    <link href="../Css/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/call.css" rel="stylesheet" type ="text/css">
 
</head>
<body>
    <header>
        <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>
 
 
        <ul>
            <li><a class="active" href="#syurui">種別</a></li>
            <li><a href="#osusume">おすすめ</a></li>
            <li><a href="#teisyokurui">定食類</a></li>
            <li><a href="#osusi">お寿司</a></li>
            <li><a href="#agemono">揚げ物</a></li>
            <li><a href="#mennrui">麺類</a></li>
        </ul> 
    </header>
    <main>
    <div id ="wrapper">
        <h1 class = "ts">テーブル番号札を持ってレジに向かってください。</h1>
        <h2 class = "ts2">ご来店ありがとうございました。</h2>
        <h2 class = "ts2">またのお越しをお待ちしております。</h2>
        <table class = "btn1">
            <tr>
                <td>
                    <button type="button" onclick="location.href='tableNumber.php'">トップへ戻る </button>
                </td>
            </tr>
        </table>
    </div>
    <?php
try{
    //$sql = "INSERT INTO cartdetail SELECT Groupa,Product1,quantity from cart where Groupa=".$_SESSION['cartapl']."";
    

    $sql = $sql1 = "DELETE FROM cartdetail WHERE Groupa=".$_SESSION['cartapl']."";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();

    unset($_SESSION['pay']);
      
} catch ( PDOException $e ) {
    print "SQLエラー!: " . $e->getMessage () . "<br/>";
    exit();
}
    ?>
            
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
</body>
</html>
 
