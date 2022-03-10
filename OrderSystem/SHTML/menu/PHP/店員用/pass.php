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
    <form action='admin.php' method="post">
	<div>
		<h1><label for="password">パスワードを入力</label></h1>
		<input type="password" name="password" placeholder="パスワードを入力" value="A"/>
	</div>
    <button id="modoru" onclick="location.href='admin.php'">送信</button>
</form>
<button id="hihyouzi" onclick="location.href='top.php'">TOPに戻る</button>
    </main>
</body>
</html>
 