<?php
    require_once 'Dbconnect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>厨房用ページ</title>
    <link href="../../CSS/kitchen.css" rel="stylesheet" type ="text/css">
  
</head>
<body>
    <main>

    <?php

    echo "<h1> \n";
    $settime=time();
    echo date("Y/m/d h:i",$settime);
    echo "</h1>\n";

    ?>

    <form action="kitchendestroy.php" method="POST">
    <div class="data">
        
        <?php

        try{
        for($i=1;$i<=30;$i++){

            $sql = "SELECT Tablenumber,Productquantity,Productname,Recommend,Orderdetail.Product FROM Orderdetail FULL join Product on Orderdetail.Product = Product.Product FUll join GroupB on Orderdetail.Groupa = GroupB.Groupa 
                where OrdeID>=1 and Tablenumber=".$i."";
            $stmt = $pdo ->prepare($sql);
            $stmt->execute();

            $sql = "SELECT count(Productquantity) as cnt FROM Orderdetail FULL join Product on Orderdetail.Product = Product.Product FUll join GroupB on Orderdetail.Groupa = GroupB.Groupa 
                where OrdeID>=1 and Tablenumber=".$i."";
            $cntstmt = $pdo ->prepare($sql);
            $cntstmt -> execute();

            


            if ($cntstmt -> fetch(PDO::FETCH_ASSOC)["cnt"] > 0){
                //$sql1 = "UPDATE Orderdetail set teblenumber =".$i." where Product1 = '".$str."'";
                //$sth1 = $pdo -> query($sql1);
            echo "<table border='1'>\n";
                    echo"<tr>\n";
                    echo"<th colspan='5'>テーブル".$i."</th>\n";   //.date("Y/m/d h:i",$row['']"");."\n";
                    echo"</tr>\n";
                    echo"<tr>\n";
                    echo"<th> </th><th>商品名</th><th>個数</th><th>優先順位</th>\n";
                    echo"</tr>\n";




            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                $sql1 = "UPDATE Orderdetail set tablenumber =".$i." where Product = '".$row['Product']."'";
                $sth1 = $pdo -> query($sql1);
                //echo $row['Product'];

                    echo"<tr>\n";
                    echo "<td><input type='checkbox'></input></td>\n";
                    echo"<td>".$row["Productname"]."</td>\n";
                    echo"<td>".$row["Productquantity"]."</td>\n";
                    echo"<td>".$row["Recommend"]."</td>\n";
                    echo"</tr>\n";   
                }

                echo "<tr>\n";
                echo "<td colspan='4'><input type='checkbox'name='area[]' value=".$i." formaction='./kitchendestroy.php'></input></td>\n";
                echo"</tr>\n"; 

            }ECHO "</table>\n";
        }
            echo "</div>\n";

        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
        ?> 

    <!-- ボタンたち -->

    <input name="confirm" type="submit" value="削除" class="btn4">
    
    <button id="modoru" formaction='top.php'>トップへ戻る</button>
    <!-- 非表示ボタン -->
    <button id="hihyouzi" formaction='kitchen.php'>更新する</button>
    </form>


    </main>
</body>
</html>
 
