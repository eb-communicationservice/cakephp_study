<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>数の挿入</h3>
	<?php
	echo "挿入前配列";
	echo "<table>";
		echo "<tr>";
		
		// 挿入する前の配列の値を取得
		foreach ($insertArray as $insertValue) {
			
			// 値を表示
			echo "<td> $insertValue </td>";
		}
		echo "</tr>";
	echo "</table>";
	
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'insert']));
	echo "挿入値";
	echo $this->Form->text('insertNum', array('maxlength' => '3'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	// エラー文言表示
	echo "<font color='#FF0000'> $errorMsg </font>";
	
	// 探索結果の値を表示
	echo "<br />挿入後結果配列";
	echo "<table>";
		echo "<tr>";
		
		// 挿入結果配列の値を取得
		// 帰ってきた結果が配列の場合
		if (is_array($resultInsertArray)) {
			
			// 順番に値を表示させる
			foreach ($resultInsertArray as $resultInsertValue) {
				
				// 値を表示
				echo "<td> $resultInsertValue </td>";
			}
		
		// 帰ってきた結果が配列ではない場合
		} else {
			
			// 帰ってきた値を表示
			echo $resultInsertArray;
		}
		echo "</tr>";
	echo "</table>";
	?>
</body>
</html>
