<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>個別会計画面</title>
    <link href="../CSS/common.css" rel="stylesheet" type="text/css">
    <link href="../CSS/pay.css" rel="stylesheet" type ="text/css">
 
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
        <table border="1" class="kaikei">
            <tr>
            <th>商品名</th><th>数量</th><th>単価</th><th>金額</th>
            </tr>
        <?php
            echo"<tr>\n";
                //データベースから持ってくる//
            echo"<td>商品名</td>\n";
            echo"<td>数量</td>\n";
            echo"<td>単価</td>\n";
            echo"<td>金額</td>\n";
            echo"</tr>\n";
 
            echo"<tr>\n";
                //データベースから持ってくる//
            echo"<td>商品名</td>\n";
            echo"<td>数量</td>\n";
            echo"<td>単価</td>\n";
            echo"<td>金額</td>\n";
            echo"</tr>\n";
 
            echo"<tr>\n";
                //データベースから持ってくる//
            echo"<td>商品名</td>\n";
            echo"<td>数量</td>\n";
            echo"<td>単価</td>\n";
            echo"<td>金額</td>\n";
            echo"</tr>\n";
 
            echo"<tr>\n";
                //データベースから持ってくる//
            echo"<td>商品名</td>\n";
            echo"<td>数量</td>\n";
            echo"<td>単価</td>\n";
            echo"<td>金額</td>\n";
            echo"</tr>\n";
 
        ?>
        </table>
 
        <!--合計金額-->
        <p class="kinngaku"><!--データベースから持ってくる--> 1700円</p>
        <p class="goukei">合計金額</p>
        <!--戻るボタン-->
        <button class="modoru" onclick="location.href='index2.php'">戻る</button>  
        <!--会計確定ボタン-->
        <button class="kakutei" onclick="location.href='payComp.php'">会計確定</button>  
        <!--個別会計ボタン-->
        <button class="kobetu" onclick="location.href='kobetu.php'">個別会計</button>  
 
        </main>
    <footer class="wrap">
        <p><small>&copy;Copyright SAGAMIYA All rights reserved.</small>
        <p>
    </footer>
</body>
</html>
 
