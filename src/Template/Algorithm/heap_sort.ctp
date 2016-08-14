<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>ヒープソート</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'heapSort']));
	echo "ソートする文字列 ※数字をカンマ（,）区切りで入力して下さい";
	echo $this->Form->text('str', array('maxlength' => '300'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	// エラー文言表示
	echo "<font color='#FF0000'> $errorMsg </font>";
	
	// バブルソート結果の値を表示
	echo "<br />ソート結果";
	echo "<table>";
		echo "<tr>";
		
		// 挿入結果配列の値を取得
		// エラーメッセージが空であった場合
		if (empty($errorMsg)) {
			
			// 順番に値を表示させる
			foreach ($resultSortArray as $resultSortArrayValue) {
				
				// 値を表示
				echo "<td> $resultSortArrayValue </td>";
			}
		}
		
		echo "</tr>";
	echo "</table>";
	?>
</body>
</html>
