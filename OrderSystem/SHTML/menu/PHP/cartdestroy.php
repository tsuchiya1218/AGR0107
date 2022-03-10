

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
        <title>メニュー</title>
        <link href="..//CSS/common.css" rel="stylesheet" type="text/css">
        <link href="..//CSS/cart.css" rel="stylesheet" type="text/css">
 
    </head>
    <body>
    <?php
    //header("Location:orderComp.php");
    ?>
        <header>
            <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>
            
        </header>
        <main>
 
        
        <form method="POST" action="orderComp.php" name="func1">
    <?php
 
    try{
        if (isset($_POST['area']) && is_array($_POST['area'])) {
            foreach( $_POST['area'] as $value ){
                //echo $value;
                $sql1 = "DELETE FROM cart WHERE Product1='".$value."'";
                $sth1 = $pdo -> query($sql1);
            }
            //echo $count = count($cart);
                //for ($i = 0 ; $i < count($value); $i++){
                //echo $value[$i]."回\n";
                
            //}
        }
            /*
            foreach( $_POST['area'] as $value ){
                echo $value."\n";
            if($value="s1"){
            //echo "{$value} ";
            }else if($value="s2"){
            //echo "{$value} ";
        }*/
 
        $pay3=0;
        $sql = "SELECT * FROM cart ";
        $stmt = $pdo ->prepare($sql);
        $stmt->execute();
        //echo "<form oninput='op1.value = Number(".$Product.".value) + 1000;'>\n";
        echo "<table border= '1'>\n";
        echo "<tr>\n";
        ECHO "<th>名前</th><th>数量</th><th>単価</th><th>金額（税込み）</th>\n";
        ECHO"</tr>\n";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $pay=$row["quantity"]*$row["Unitprice"];

            echo "<tr>\n";
            echo "<td>".$row['Productname']."</td>\n";
            echo "<td>".$row['Unitprice']."</td>\n";
            echo "<td>".$row['quantity']."</td>\n";
            echo "<td>".$row['subtotal']."</td>\n";
            $price=$row['subtotal'];
            $kazu=$row['quantity'];
            $price2=$row['Unitprice'];
            $Product2=$row['Product1'];

            $pay3+=$pay;

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
     <table border="1">
            <td>
                <!--合計金額-->
                <p class="kinngaku">
                <?php
                
                echo "合計金額　　".$pay3."円";
                
                ?>
                </p>
            </td>
        </table>
    
    <!-- 戻るボタン -->
        <button type="button" onclick="location.href='index2.php'">戻る</button>
    <!-- 決定ボタン -->
    <div class="btn2">
        <button type="button" onclick="location.href='orderComp.php'">決定</button>
    </div>
 
    </form>
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
        
    </body>
    </html>
 
 

