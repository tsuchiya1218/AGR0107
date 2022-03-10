<?php
require_once 'Dbconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>呼び出しページ</title>
    <link href="../CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/call.css" rel="stylesheet" type ="text/css">
 
</head>
<body>
    <header>
        <h1 class="logo"><img src="../../img2/Logo.png" alt="sagamiya" width="300" height="90"></h1>
        <?php
        
        $_SESSION['toi']=$_SESSION['cartapl'];

        ?>
 
 
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
        <h1 class = "ts">店員を呼び出し中です。<br>しばらくお待ちください。</h1>
        <table class = "btn1">
            <tr>
                <td>
                    <button type="button" onclick="location.href='index2.php'">メニューへ戻る </button>
                </td>
            </tr>
        </table>
    </div>
            
    </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
</body>
</html>
 
