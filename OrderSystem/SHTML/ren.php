<?php
	//DBの接続部分を読み込む
	require_once 'DBconnect.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>課題3-1</title>
</head>
<body>
	<table border="1">
		<caption>メーカー表の一覧表示</caption>
		<tr>
			<td>会社ID</td>
			<td>会社名</td>
            <td>tel</td>
		</tr>
<?php
try {
	$sql = 'SELECT * FROM ';
	$stmt = $pdo ->prepare($sql);
	$stmt->execute();

	$cnt = 0;
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>\n";
		echo "<td>" . $row ["Societycode"] . "</td>\n";
		echo "<td>" . $row ["Societyname"] . "</td>\n";
	
		echo "</tr>\n";
		$cnt++;
	}

	$pdo = null;   // DB接続を切断

} catch ( PDOException $e ) {
	print "SQLエラー!: " . $e->getMessage () . "<br/>";
	exit();
}
?>
</table>
</body>
</html>