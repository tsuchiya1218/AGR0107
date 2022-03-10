<?php
require_once 'Dbconnect.php';
session_start();
$_SESSION['time']=0;
$_SESSION['table']=0;
?>
<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>テーブル番号ページ</title>
    <link href="..//CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/call.css" rel="stylesheet" type ="text/css">
 
</head>
<body>
    <header>
        <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>
 
 
        <ul>
            <li><a class="active" href="#syurui">種別</a></li>
            <li><a href="#osusume">おすすめ</a></li>
            <li><a href="#teisyokurui">定食類</a></li>
            <li><a href="#osusi">お寿司</a></li>
            <li><a href="#agemono">揚げ物</a></li>
            <li><a href="#mennrui">麺類</a></li>
        </ul> 
    </header>
    <main>
    <div id ="wrapper">
        <h1 class = "ts">テーブル番号を入力<br>
        してください。</h1>


        <form id="tbnumform" action="index2.php" method="POST">
        <table class = "btn1">
            <tr>
            <td> 
            <?php
            $settime=time();
            echo date("Y/m/d h:i",$settime);
            if(isset($_SESSION["time"])){
                $_SESSION["time"]=$settime;
            }
            if(isset($_SESSION["table"])){
                $_SESSION["table"];
            } ?>
                </td>
                <td> 
                <input name="tablenumber" type="number" min="0" MAX="30">番テーブル
                </td>

                <td>
                <input name="confirm" type="submit" value="決定">
                </td>
                </tr>
        </form>
        </table>
        
        </div>
            
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
</body>
</html>