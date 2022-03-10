<?php
require_once 'Dbconnect.php';
session_start();
$_SESSION['aaa']=0;
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品選択画面</title>
    <link href="../CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/menu.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <!--ロゴ-->
        <p class="logo">
            <img src="../../img2/Logo.png" alt="ロゴ" title="ロゴ" width="300" height="90">
        </p>
        <!--種別-->
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
    <!--商品画像-->
    <div class="food">
        <p class="left">
        <?php
        
         try{
            $sql = "SELECT * FROM Product where Product='".$_GET['name']."'";
            $stmt = $pdo ->prepare($sql);
            $stmt->execute();
            
 
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            echo "<img src=".$row ["Screen"]." class='gazou' alt='商品' title='商品' width='550' height='350'>\n";
            "</p>\n";
            //説明文
            echo "<p class='left'><font size='6'>".$row["Productname"]."<br>\n";
            echo "<p class='right'><font size='6'>".$row["Unitprice"]."円<br>\n";
            echo "<p class='setumei'><font size='5'>".$row["Explanation"]."\n";
            "</font></p>\n";
 
            $aaa=$row["Product"];
            
 
            }
            
    } catch ( PDOException $e ) {
        print "SQLエラー!: " . $e->getMessage () . "<br/>";
        exit();
    }
    ?>
    </div>
    
        <!--金額-->
    <div class="left" id="sonota">
        <button id="modoru" onclick="location.href='index2.php'">戻る</button>  
    </div>
    <div class="spinner_area"　id="sonota">
        <!--数量選択ボタン-->
            <button id="plusButton">+</button>
            <button id="minusButton">-</button>
            <form action="cart.php" method="POST">
            
 
            <input id="counterOutput" value="0" name="aa" >
            <input id="cart" type="submit" value="カートへ">
 
 
            <?php
            
            if(isset($_SESSION["aaa"])){
                 $_SESSION["aaa"]=$aaa;
            }
            unset($aaa);
            ?>
 
            </form>
    </div>
    </main>
    <footer>
    <br>
    <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
    </footer>
    <script src="../../JS/menu.js"></script>
</body>
</html>

