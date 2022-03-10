<?php
require_once 'Dbconnect.php';
session_start();
 
?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会計画面</title>
    <link href="../CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/cart.css" rel="stylesheet" type ="text/css">
 
</head>
<body>
    <header>
        <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>
 
 
  
    </header>
    <main>
        <table border="1" class="kaikei">
            <tr>
            <th>商品名</th><th>数量</th><th>単価</th><th>金額</th>
            </tr>
 
        <?php
        try{
           // echo $_SESSION['cartapl'];グループ番号

           $sql = "SELECT Productname,Unitprice,Productquantity FROM Product FULL join cartdetail2 on cartdetail2.Product = Product.Product
                 where Groupa2='".$_SESSION['cartapl']."'";//57,s1
            //$sql = "SELECT * FROM cartdetail where Groupa=".$_SESSION['cartapl']."";
            $stmt = $pdo ->prepare($sql);
            $stmt->execute();
            $pay2=0;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $pay=$row["Productquantity"]*$row["Unitprice"];
                echo"<tr>\n";
                echo"<td>".$row["Productname"]."</td>\n";
                echo"<td>".$row["Productquantity"]."</td>\n";
                echo"<td>".$row["Unitprice"]."</td>\n";
                echo"<td>".$pay."</td>\n";
                echo"</tr>\n"; 
                
                $pay2+=$pay;
            }
        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
        ?>
        </table>
 
        <table border="1">
            <td>
                <!--合計金額-->
                <p class="kinngaku">
                <?php
                if(isset($pay2)){
                echo "合計金額　　".$pay2."円";
                }
                ?>
                </p>
            </td>
        </table>
 
        <!--戻るボタン-->
        <button class="btn1" onclick="location.href='index2.php'">戻る</button>  
        <!--会計確定ボタン-->
        <button class="btn2" onclick="location.href='payComp.php'">会計確定</button>  
        <!--個別会計ボタン-->
        <button class="btn3" onclick="location.href='kobetu.php'">個別会計</button>  
 
        </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
</body>
</html>

