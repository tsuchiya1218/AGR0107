<?php
require_once 'Dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注文完了画面</title>
    <link href="..//Css/common.css" rel="stylesheet" type="text/css">
    <link href="..//CSS/call.css" rel="stylesheet" type ="text/css">
 
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
        <h1 class = "ts">ご注文ありがとうございます。</h1>
        <h1 class = "ts2">注文を承りました。</h1>
        <table class = "btn1">
            <tr>
                <td>
                    <button type="button" onclick="location.href='index2.php'">商品一覧へ戻る </button>
                </td>
            </tr>
        </table>
    </div>
   
    <?php
try{
    unset($_SESSION['pay']);
    for($i=1;$i<=12;$i++){
        $str="s".$i;
        if(isset($_POST[$str])){
            $sql1 = "UPDATE cart set quantity =".$_POST[$str]." where Product1 = '".$str."'";
            $sth1 = $pdo -> query($sql1);
            //$stmt->execute();
        }
    }
    $sql = "INSERT INTO cartdetail SELECT Groupa,Product1,quantity from cart where Groupa=".$_SESSION['cartapl']."";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO cartdetail2 SELECT Groupa,Product,Productquantity from cartdetail where Groupa=".$_SESSION['cartapl']."";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();

    $sql = $sql1 = "DELETE FROM cart WHERE Groupa=".$_SESSION['cartapl']."";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO Orderdetail(Groupa,Product,Productquantity) SELECT Groupa,Product,Productquantity from cartdetail where cartdetail.Groupa=".$_SESSION['cartapl']."";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute();

    

    $sql1 = "DELETE FROM cartdetail WHERE Groupa=".$_SESSION['cartapl']."";
    $sth1 = $pdo -> query($sql1);
      
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
 
