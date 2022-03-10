
    <?php
    require_once 'Dbconnect.php';
    session_start();
    ?>
 
    <!DOCTYPE html>
    <html lang="ja">
 
    <script>

function changeprice(params,price) {
    
    var kosuu = document.getElementById(params).value;
    var sum = price*kosuu;
    var ansert="answer"+params;
    var answer = document.getElementById( ansert );
    
    answer.innerHTML = sum;

    
    var s =document.getElementById("pay").textContent;
    var sss=Number(s)+price;

    
    pay.innerHTML = sss;

}
</script>
    
 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>メインメニュー</title>
        <link href="../CSS/common.css" rel="stylesheet" type="text/css">
        <link href="../CSS/cart.css" rel="stylesheet" type="text/css">
 
    </head>
    <body>
        <header>
            <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>
            
        </header>
        <main>
 
        
        <form method="POST" action="orderComp.php" name="func1">
    <?php
    
    try{

        //unset($_SESSION['visited']);
        //IF(!isset($_SESSION["visited"])){
            //print('初回の訪問です。セッションを開始します。');
            //$_SESSION["visited"] = 1;


            if(isset($_POST['aa'])&&$_POST['aa']>0){
                $pay2=0;
            

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
                $stmt = $pdo ->prepare($sql);
                $stmt->execute(); 
        //echo "<form oninput='op1.value = Number(".$Product.".value) + 1000;'>\n";
                echo "<table border= '1'>\n";
                echo "<tr>\n";
                ECHO "<th>名前</th><th>単価</th><th>数量</th><th>金額（税込み）</th><th>削除</th>\n";
                ECHO"</tr>\n";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>\n";
                    echo "<td>".$row['Productname']."</td>\n";
                    echo "<td>".$row['Unitprice']."</td>\n";
                    $price=$row['subtotal'];
                    $kazu=$row['quantity'];
                    $price2=$row['Unitprice'];
                    $Product2=$row['Product1'];            
                    $pay=$row['quantity']*$row['Unitprice'];
                    $pay2+=$pay;
                    $_SESSION['pay']=$pay2; 
                    echo "<td><input type='number' name=$Product2 id=$Product2 onChange='changeprice(\"".$Product2."\",$Unitprice)' min='0' value='".$row['quantity']."'></input></td>\n";
                    echo "<td id='answer"."".$Product2."'>$price</td>\n";
                    echo "<td class='check'><input type='checkbox' name='area[]' formaction='./cartdestroy.php' value=".$row['Product1']."></input></td>\n";
            //echo "<th><input type='button' value='削除'onclick='document.getElementById('xyz').style.display = 'none';'></th>\n";
                    echo "</tr>\n";
                    unset($price);
            //unset($_SESSION['aaa']);
                }
                if(isset($price2)){
                    $_SESSION['price2']=$price2;
                    unset($price2);
                } 
                echo "</table>\n";
            }
        else if(!isset($_POST['aa'])){

        $sql = "SELECT * FROM cart";
        $stmt = $pdo ->prepare($sql);
        $stmt->execute();
 

        echo "<table border= '1'>\n";
        echo "<tr>\n";
        ECHO "<th>名前</th><th>単価</th><th>数量</th><th>金額（税込み）</th><th>削除</th>\n";
        ECHO"</tr>\n";

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            echo "<tr>\n";
            echo "<td>".$row['Productname']."</td>\n";
            echo "<td>".$row['Unitprice']."</td>\n";
            $price=$row['subtotal'];
            $kazu=$row['quantity'];
            $price2=$row['Unitprice'];
            $Product2=$row['Product1'];
            $pay=$row['quantity']*$row['Unitprice'];
            echo "<td><input type='number' name=$Product2 id='input01' min='0' value='".$row['quantity']."'></input></td>\n";
            echo "<td id='answer'>$price</td>\n";
            echo "<td><input type='checkbox' name='area[]' formaction='./cartdestroy.php' value=".$Product2."></input></td>\n";
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
   
  



    <table border="1">
           
                <!--合計金額-->
               
                <?php
                echo " <td id='answer'>\n";

                if(isset($_SESSION['pay'])){
                echo "合計金額　　<span id='pay'>".$_SESSION['pay']."</span>円";
                }
                echo "</td>\n";
                ?>
                
            

        </table>



    <!-- 削除ボタン -->
        <input name="confirm" type="submit" value="削除"formaction="./cartdestroy.php" class="btn1">


    <!-- 決定ボタン -->

    <div class="btn2">
        <button type="button" onclick="location.href='orderComp.php'">決定</button>
    </div>
            </form>

<!-- 戻るボタン -->
<div class="btn3">
        <button type="button" onclick="location.href='index2.php'">商品検索に戻る</button>
    </div>


    
 
 
    </form>
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
        
    </body>
    </html>
