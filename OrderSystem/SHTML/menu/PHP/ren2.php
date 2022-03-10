<!DOCTYPE html>
<html>
<head>
<title>HTML入門-フォームの作成</title>

</head>
<body>
<<form action="ren.php" method="POST">
    <p>好きな色（複数回答可）: 
        <input type="checkbox" name="colors[]" value="white">白
        <input type="checkbox" name="colors[]" value="black">黒
        <input type="checkbox" name="colors[]" value="red">赤
        <input type="checkbox" name="colors[]" value="blue">青
        <input type="checkbox" name="colors[]" value="green">緑
    </p>
    <p><input type="submit" value="送信"></p>
</form>
</body>
</html>





<?php
    require_once 'Dbconnect.php';
    session_start();
    ?>

    <!DOCTYPE html>
    <html lang="ja">

    <script type = "text/javascript">
    <!--
    window.onload = function() {
    var input01 = document.getElementById( "input01" ); // DOM要素を用意しておく
    //var input02 = document.getElementById( "input02" ); // DOM要素を用意しておく
    var answer = document.getElementById( "answer" ); // DOM要素を用意しておく

    //input01.value = ""; // 初期化
    //input02.value = ""; // 初期化
    answer.value = ""; // 初期化

    input01.onclick = function() { // キー入力が終わった瞬間に実行される関数の宣言
    answer.innerHTML = parseInt( input01.value, 10 ) * 10 ); // 実際の計算
    };
    }
// -->
</script>
    

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>メインメニュー</title>
        <link href="..//CSS/common.css" rel="stylesheet" type="text/css">
        <link href="..//CSS/call.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <header>
            <h1 class="logo"><img src="../../img2/Logo.jpg" alt="sagamiya" width="300" height="90"></h1>
            
        </header>
        <main>

        
        <form method="POST" action="orderComp.php" name="func1">
    <?php
    

    /*if(!empty($_POST['aa'])){
    echo $_POST['aa'];
    }else
    echo "データ未送信";
    if(empty($_SESSION["aaa"])){
    echo $_SESSION["aaa"];
    }*/

    //<form oninput="op1.value = Number(a.value) + 0;">残り
    //echo "<form oninput='op1.value = Number(".$kazu.".value) + 0;'>\n";
    //echo "<th><input type='number' name=".$Product2." value='".$row['quantity']."' size='5'></th>\n";
    //echo "<th><output name='op1'>$price</output></th>\n";
    //echo "</form>\n";
    try{
        if(isset($_POST['aa'])){

        $sql = "SELECT * FROM Product where Product='".$_SESSION['aaa']."'";//s1
        $stmt = $pdo ->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $Productname=$row["Productname"];
        $Unitprice=$row["Unitprice"];
        $cart1=$_SESSION['cart'];
        $Product=$row['Product'];
        $kosuu=$_POST['aa'];
        $subtotal=$row["Unitprice"]*$_POST['aa'];
        }
        
    
        //$sql = "INSERT GroupB(Tablenumber,Ordertime) VALUES(".$_POST['tablenumber'].", ".$settime.")"; 
        

        $sql1 = "INSERT cart(Groupa,Product1,Productname,Unitprice,subtotal,quantity)
        VALUES(".$_SESSION['cart'].",'".$Product."','".$Productname."', ".$Unitprice.", ".$subtotal.",".$kosuu.")";
        $sth1 = $pdo -> query($sql1);
        $stmt->execute();

        $sql = "SELECT * FROM cart where Groupa='".$cart1."'";
        echo $cart1;

        $stmt = $pdo ->prepare($sql);
        $stmt->execute();

        //echo "<form oninput='op1.value = Number(".$Product.".value) + 1000;'>\n";
        echo "<table border= '1'>\n";
        echo "<tr>\n";
        ECHO "<th>名前</th><th>単価</th><th>数量</th><th>金額（税込み）</th><th>削除</th>\n";
        ECHO"</tr>\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>\n";
            echo "<th>".$row['Productname']."</th>\n";
            echo "<th>".$row['Unitprice']."</th>\n";
            $price=$row['subtotal'];
            $kazu=$row['quantity'];
            $price2=$row['Unitprice'];
            $Product2=$row['Product1'];
            



            echo "<th><input type='number' name=$Product2 id='input01' min='0' value='".$row['quantity']."'></input></th>\n";
            echo "<th id='answer'>$price</th>\n";
            echo "<th><input type='checkbox' name='area[]' formaction='./cartdestroy.php' value=".$row['Product1']."></input></th>\n";
            //echo "<th><input type='button' value='削除'onclick='document.getElementById('xyz').style.display = 'none';'></th>\n";
            echo "</tr>\n";
            unset($price);
            //unset($_SESSION['aaa']);
            if(isset($price2)){
                $_SESSION['price2']=$price2;
                unset($price2);
            }
            
        }
        echo "</table>\n";
    }else if(!isset($_POST['aa'])){
        $sql = "SELECT * FROM cart";
        $stmt = $pdo ->prepare($sql);
        $stmt->execute();

        //echo "<form oninput='op1.value = Number(".$Product.".value) + 1000;'>\n";
        echo "<table border= '1'>\n";
        echo "<tr>\n";
        ECHO "<th>名前</th><th>単価</th><th>数量</th><th>金額（税込み）</th><th>削除</th>\n";
        ECHO"</tr>\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>\n";
            echo "<th>".$row['Productname']."</th>\n";
            echo "<th>".$row['Unitprice']."</th>\n";
            $price=$row['subtotal'];
            $kazu=$row['quantity'];
            $price2=$row['Unitprice'];
            $Product2=$row['Product1'];
        
            echo "<th><input type='number' name=$Product2 id='input01' min='0' value='".$row['quantity']."'></input></th>\n";
            echo "<th id='answer'>$price</th>\n";
            echo "<th><input type='checkbox' name='area[]' formaction='./cartdestroy.php' value=".$Product2."></input></th>\n";
            //echo "<th><input type='button' value='削除'onclick='document.getElementById('xyz').style.display = 'none';'></th>\n";
            echo "</tr>\n";
            unset($price);
            //unset($_SESSION['aaa']);
            if(isset($price2)){
                $_SESSION['price2']=$price2;
                unset($price2);
            }
            
        }
        echo "</table>\n";
    }
        } catch ( PDOException $e ) {
        print "SQLエラー!: " . $e->getMessage () . "<br/>";
        exit();
    }
    ?>
    <input name="confirm" type="submit" value="削除"formaction="./cartdestroy.php">
    <p><a href ="./index2.php">戻る</a></p>
    <input name="confirm" type="submit" value="決定">
    </form>
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
        
    </body>
    </html>









    <?php
    require_once 'Dbconnect.php';
    session_start();
    ?>

    <!DOCTYPE html>
    <html lang="ja">

    <script type = "text/javascript">
    /*<!--
    window.onload = function() {
    var input01 = document.getElementById( "input01" ); // DOM要素を用意しておく
    //var input02 = document.getElementById( "input02" ); // DOM要素を用意しておく
    var answer = document.getElementById( "answer" ); // DOM要素を用意しておく

    //input01.value = ""; // 初期化
    //input02.value = ""; // 初期化
    answer.value = ""; // 初期化

    input01.onclick = function() { // キー入力が終わった瞬間に実行される関数の宣言
    answer.innerHTML = parseInt( input01.value, 10 ) * 10 ); // 実際の計算
    };
    }
// -->*/
</script>
    

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>メインメニュー</title>
        <link href="..//CSS/common.css" rel="stylesheet" type="text/css">
        <link href="../CSS/cart.css" rel="stylesheet" type ="text/css">


    </head>
    <body>
    <?php
	//header("Location:orderComp.php");
    ?>
        <header>
            <h1 class="logo"><img src="../../img2/Logo.jpg" alt="sagamiya" width="300" height="90"></h1>
            
        </header>
        <main>

        
        <form method="POST" action="orderComp.php" name="func1">
    <?php

    try{
        //echo $_POST['s1'];
        //$checked_arr = $_POST['area'];
        //echo $count = count($checked_arr);
        //echo $aa=implode($_POST['area']);

        if (isset($_POST['area']) && is_array($_POST['area'])) {
            foreach( $_POST['area'] as $value ){
                //echo $value;
                $sql1 = "DELETE FROM cart WHERE Product1='".$value."'";
                $sth1 = $pdo -> query($sql1);
            }
        }
        $sql = "SELECT * FROM cart ";
        $stmt = $pdo ->prepare($sql);
        $stmt->execute();
        //echo "<form oninput='op1.value = Number(".$Product.".value) + 1000;'>\n";
        echo "<table border= '1'>\n";
        echo "<tr>\n";
        ECHO "<th>名前</th><th>単価</th><th>数量</th><th>金額（税込み</th>\n";
        ECHO"</tr>\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>\n";
            echo "<th>".$row['Productname']."</th>\n";
            echo "<th>".$row['Unitprice']."</th>\n";
            echo "<th>".$row['quantity']."</th>\n";
            echo "<th>".$row['subtotal']."</th>\n";
            $price=$row['subtotal'];
            $kazu=$row['quantity'];
            $price2=$row['Unitprice'];
            $Product2=$row['Product1'];
        }      
        echo "</tr>\n";
        unset($price);
        //unset($_SESSION['aaa']);
        if(isset($price2)){
            $_SESSION['price2']=$price2;
            unset($price2);
        }
        echo "</table>\n";

        } catch ( PDOException $e ) {
        print "SQLエラー!: " . $e->getMessage () . "<br/>";
        exit();
    }
    ?>

    <p><a href ="./index2.php">戻る</a></p>
    <input name="confirm" type="submit" value="決定">
    </form>
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
        
    </body>
    </html>


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
           $sql = "SELECT Productname,Unitprice,Productquantity FROM Product FULL join cartdetail on cartdetail.Product = Product.Product
                 where Groupa='".$_SESSION['cartapl']."'";//57,s1
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
