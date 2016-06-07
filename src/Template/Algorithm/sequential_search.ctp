<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>逐次探索</h3>
	<?php
	echo "探索する配列";
	echo "<table>";
		echo "<tr>";
		
		// 探索する配列の値を取得
		foreach ($numArray as $numValue) {
			
			// 値を表示
			echo "<td> $numValue </td>";
		}
		echo "</tr>";
	echo "</table>";
	
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'sequentialSearch']));
	echo "探索値";
	echo $this->Form->text('seqSearchNum', array('maxlength' => '3'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	// エラー文言表示
	echo "<font color='#FF0000'> $errorMsg </font>";
	
	// 探索結果の値を表示
	echo "<br />探索結果：" . $resultSeqSearch;
	?>
</body>
</html>
