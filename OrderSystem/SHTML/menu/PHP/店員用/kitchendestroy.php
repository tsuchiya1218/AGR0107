<?php
    require_once 'Dbconnect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>店長用ページ</title>
    <link href="../CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/call.css" rel="stylesheet" type ="text/css">
 
</head>
<body>
    <main>
    
    <?php

try{
    //echo $_POST['area'];
    if (isset($_POST['area']) && is_array($_POST['area'])) {
        foreach( $_POST['area'] as $value ){
            $sql1 = "DELETE FROM Orderdetail WHERE tablenumber='".$value."'";
            $sth1 = $pdo -> query($sql1);
        }
    }
    
    } catch ( PDOException $e ) {
    print "SQLエラー!: " . $e->getMessage () . "<br/>";
    exit();
}
header("Location:kitchen.php")

?>
<button id="hihyouzi" onclick="location.href='kitchen.php'">更新する</button>
    </main>
</body>
</html>
