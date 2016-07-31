<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>二分探索</h3>
	<?php
	echo "探索する配列";
	echo "<table>";
		echo "<tr>";
		
		// 探索する配列の値を取得
		foreach ($binarySearchArray as $binarySearchValue) {
			
			// 値を表示
			echo "<td> $binarySearchValue </td>";
		}
		echo "</tr>";
	echo "</table>";
	
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'binarySearch']));
	echo "探索値";
	echo $this->Form->text('binarySearchNum', array('maxlength' => '3'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	// エラー文言表示
	echo "<font color='#FF0000'> $errorMsg </font>";
	
	// 探索結果を表示
	echo "<br />探索結果";
	
	// エラーメッセージが空であった場合
	if (empty($errorMsg)) {
		
		// 値を表示
		echo "<br /> $resultSearch";
	
	// エラーメッセージが空でない場合
	} else {
		
		// なにも表示しない
	}
	?>
</body>
</html>
