<?php
require_once 'Dbconnect.php';
session_start();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>メインメニュー</title>
    <link href="../CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/index.css" rel="stylesheet" type="text/css">

</head>
<body>

    <header>
        <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>


        <ul class="inline-block">
            <li><a class="active" href="#syurui">種別</a></li>
            <li><a href="osusume.php">おすすめ</a></li>
            <li><a href="teisyokurui.php">定食類</a></li>
            <li><a href="osusi.php">お寿司</a></li>
            <li><a href="agemono.php">揚げ物</a></li>
            <li><a href="mennrui.php">麺類</a></li>
        </ul> 
    </header>
    <main>


   

    
    <table class="table2">
    <?php
        try{
            $settime=$_SESSION['time'];
            //echo date("Y/m/d h:i",$settime);
            //echo $_POST['tablenumber'];

            if(isset($_SESSION["table"])){

            $sql = "INSERT GroupB(Tablenumber,Ordertime) VALUES(".$_POST['tablenumber'].", ".$settime.")";
            $sth = $pdo -> query($sql);

            $sql = "SELECT * FROM GroupB where Tablenumber in(".$_POST['tablenumber'].")";
            $stmt = $pdo ->prepare($sql);
	        $stmt->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $cart=$row["Groupa"];
                $_SESSION['cart']=$cart;
                $_SESSION['cartapl']=$cart;
                

            unset($_SESSION["table"]);
            }
            }

            // $stmt = $pdo->prepare('INSERT INTO GroupB (tablenumber,ordertime) VALUES(:tablenumber, :ordertime,)');
            // 値をセット
            // $stmt->bindValue(':tablenumber',$_POST['tablenumber']);
            // $stmt->bindValue(':ordertime', );

            $sql = "SELECT * FROM Product where Product in('s1')";
          
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                #"<form method='post' name='add' action='menu.php'>\n";
                #"<input type=hidden name='add'>\n";
                echo "<th><a href='menu.php?name=s1'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                #"</form>\n";
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                echo "</tr>\n";
                
                //echo date("Y/m/d h:i",$settime);


                if (isset($_GET['s1'])){
                    $_GET['s1'];
                }
                unset($id);
            }

        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
        ?>

        <?php
        try{
            $sql = "SELECT * FROM Product where Product in('s2')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s2'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";
               
                if (isset($_GET['s2'])){
                    $_GET['s2'];
                }
            unset($id);
            }
                
        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
    ?>

        </table>
            
        <table class="table2">
    <?php
        try{
            $sql = "SELECT * FROM Product where Product in('s3')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s3'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";

                if (isset($_GET['s3'])){
                    $_GET['s3'];
                }
            }
            unset($id);     
        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
    ?>


    <?php

    try{
        $sql = "SELECT * FROM Product where Product in('s4')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s4'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";
                if (isset($_GET['s4'])){
                    $_GET['s4'];
                }
            unset($id);
            }
        }catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
        
    ?>
        </table>
        <table class="table2">


    <?php
        try{
            $sql = "SELECT * FROM Product where Product in('s5')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s5'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";
                if (isset($_GET['s5'])){
                    $_GET['s5'];
                }
            unset($id);
            }
            
        }catch ( PDOException $e ) {
                print "SQLエラー!: " . $e->getMessage () . "<br/>";
                exit();
            }
            ?>


        <?php
            try{

            $sql = "SELECT * FROM Product where Product in('s6')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s6'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";
                if (isset($_GET['s6'])){
                    $_GET['s6'];
                }
            unset($id);
            }
                
        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
    ?>
        </table>

        <table height="40" class="table3">
            <tr><td width="300"height="140"><a href ="./call.php">呼び出し</td></tr>
            <tr><td width="300"height="140"><a href ="./transform.php">翻訳</td></tr>
            <tr><td width="300"height="140"><a href ="./cart.php">カート</td></tr>
            <tr><td width="300"height="140"><a href ="./pay.php">会計</td></tr>
        </table>


    </main>
    <footer class="wrap">
		<p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        
		<p>
	</footer>
</body>
</html>