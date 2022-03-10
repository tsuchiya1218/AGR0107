<?php
#session_start();
#echo $_POST['message'];
#$kosuu=$_POST['message'];
#echo $kosuu;
#$_SESSION['kosuu']=$kosuu;
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>サンプルページ</title>
  </head>
  <body>
 
    <form action="ren.php" method="post">
      <input type="text" name="message"><br>
      <input type="submit" value="送信">
    </form>


    <?php
echo '<p>好きな色: ';
if (isset($_POST['colors']) && is_array($_POST['colors'])) {
  foreach( $_POST['colors'] as $value ){
      echo "{$value}, ";
  }
}
echo '</p>';
?>
    
  
</form>

<form oninput='op1.value = Number(a.value) + 0;'>
  <input type="number" name="a" value="3" size="5">
  ＋
  ＝ <output name="op1">0</output>
</form>
<?php
$test = ['one', 'two', 'tree', 'four', 'five'];
 
for ($i = 0 ; $i < count($test); $i++){
  echo $test[$i] . "回目のループです\n";

        /*echo "</table>\n";

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
                echo "<td>".$row['Productname']."</td>\n";
                echo "<td>".$row['Unitprice']."</td>\n";
                $price=$row['subtotal'];
                $kazu=$row['quantity'];
                $price2=$row['Unitprice'];
                $Product2=$row['Product1'];
            

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

    
    ?>*/
}
?>
 
  </body>
</html>


        