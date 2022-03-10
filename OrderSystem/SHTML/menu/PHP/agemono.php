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
    <link href="../CSS/rui.css" rel="stylesheet" type="text/css">

</head>
<body>
	<header>
        <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>


        <ul>
            <li><a class="active" href="#syurui">種別</a></li>
            <li><a href="osusume.php">おすすめ</a></li>
            <li><a href="teisyokurui.php">定食類</a></li>
            <li><a href="osusi.php">お寿司</a></li>
            <li><a href="agemono.php">揚げ物</a></li>
            <li><a href="mennrui.php">麺類</a></li>
        </ul> 
    </header>
    <main>
    
    <table class="table2" >

    <?php
        try{
            $sql = "SELECT * FROM Product where Product in('s7')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                #"<form method='post' name='add' action='menu.php'>\n";
                #"<input type=hidden name='add'>\n";
                echo "<th><a href='menu.php?name=s7'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                #"</form>\n";
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";
                
                
                if (isset($_GET['s7'])){
                    $_GET['s7'];
                }
                unset($id);
            }

        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
        ?>
        </table>
        <table class="table2" >

        <?php
        try{
            $sql = "SELECT * FROM Product where Product in('s8')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s8'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";
               
                if (isset($_GET['s8'])){
                    $_GET['s8'];
                }
            unset($id);
            }
                
        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
    ?>

            </table>


            
            <table class="table2" >
    <?php
        try{
            $sql = "SELECT * FROM Product where Product in('s9')";
	        $stmt = $pdo ->prepare($sql);
	        $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>\n";
                echo "<th><a href='menu.php?name=s9'><img src=".$row ["Screen"]." class='gazou'></a></th>\n";
                
                echo "<tr align='center'>\n";
                echo "<td><font size='5'>".$row["Productname"]."</td>\n";
                
                echo "</tr>\n";

                if (isset($_GET['s9'])){
                    $_GET['s9'];
                }
            }
            unset($id);     
        } catch ( PDOException $e ) {
            print "SQLエラー!: " . $e->getMessage () . "<br/>";
            exit();
        }
    ?>
        </table>
        <table 　height="40" class="table3">
            <tr><td width="300"height="140"><a href ="./call.php">呼び出し</td></tr>
            <tr><td width="300"height="140"><a href ="./transform.php">翻訳</td></tr>
            <tr><td width="300"height="140"><a href ="./cart.php">カート</td></tr>
            <tr><td width="300"height="140"><a href ="./pay.php">会計</td></tr>
        </table>
    </main>
    <footer class="wrap">
		<p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
    
        <script src="../../JS/menu.js"></script>
		<p>
	</footer>
</body>
</html>