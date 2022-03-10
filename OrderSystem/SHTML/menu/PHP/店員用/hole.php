<?php
    require_once 'Dbconnect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ホール用ページ</title>
    <link href="../../CSS/hole.css" rel="stylesheet" type ="text/css">
 
</head>
<body>
    <header>
        <h1>ホール用画面</h1>
    </header>
    <main>
    <div class="data">
        <table border="1"class="drink">
            <tr><th width="300"height="70" colspan="3">ドリンク注文一覧</th></tr>
            <tr><td width="300"height="70">席番号</td><td>商品名</td><td>個数</td></tr>
            <!-- データベースから持ってくる -->
            <?php
            echo"<tr><td>01</td>\n";
            echo"<td>~~~</td>\n";
            echo"<td>2</td></tr>\n";
 
            echo"<tr><td>01</td>\n";
            echo"<td>~~~</td>\n";
            echo"<td>1</td></tr>\n";
            
            echo"<tr><td>03</td>\n";
            echo"<td>~~~</td>\n";
            echo"<td>1</td></tr>\n";
            
            ?>
        </table>
 




        <table border="1"class="food">
            <tr><th width="300"height="70" colspan="3">注文商品一覧</th></tr>
            <tr><td width="300"height="70">席番号</td><td>商品名</td><td>個数</td></tr>
            <!-- データベースから持ってくる -->
        <?php
         try{
            // echo $_SESSION['cartapl'];グループ番号
            $sql = "SELECT Tablenumber,Productquantity,Productname FROM Orderdetail FULL join Product on Orderdetail.Product = Product.Product FUll join GroupB on Orderdetail.Groupa = GroupB.Groupa 
                where OrdeID>=1";//61,s1
             //$sql = "SELECT * FROM cartdetail where Groupa=".$_SESSION['cartapl']."";
             $stmt = $pdo ->prepare($sql);
             $stmt->execute();
             
             while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                 echo"<tr>\n";
                 
                 echo"<td>".$row["Tablenumber"]."</td>\n";
                 echo"<td>".$row["Productname"]."</td>\n";
                 echo"<td>".$row["Productquantity"]."</td>\n";
                 
                 echo"</tr>\n"; 
                 
             }
         } catch ( PDOException $e ) {
             print "SQLエラー!: " . $e->getMessage () . "<br/>";
             exit();
         }
        ?>
        </table>
    </div>
 
    <table border="1"class="table3">
            <tr><th width="300"height="70" colspan="3">お客様対応</th></tr>
            <!-- データベースから持ってくる -->
            <?php
            if(isset($_SESSION['toi'])){
            echo"<tr><td>01</td>\n";
            echo"<td>".$_SESSION['toi']."</td>\n";
            echo"<td><a href='hole.php'>確認</td></tr>\n";
            unset($_SESSION['toi']);
            
        }

            ?>
        </table>
 
   <!-- 戻るボタン -->
    <div class="btn1">
        <button type="button1" onclick="location.href='top.php'">TOPに戻る</button>
    </div>
    <!-- 決定ボタン -->
    <div class="btn2">
        <button type="button" onclick="location.href='hole.php'">更新</button>
    </div>
    </main>
</body>
</html>
 
