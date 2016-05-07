<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>階乗</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'magicSquare']));
	echo "値";
	echo $this->Form->text('magicSquareNum', array('maxlength' => '2'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	
	echo "<br />▼魔法陣結果<br />";
	
	// 結果が存在している場合
	if ($resultMagicSquare != null) {
		
		// テーブル作成
		echo "<table>";
		
		// テーブルの行数分繰り返し
		for ($i = 0; $i < count($resultMagicSquare); $i++) {
			
			echo "<tr>";
			
			// テーブルの列数分繰り返し
			for ($j = 0; $j < count($resultMagicSquare[0]); $j++) {
				
				// 各カラムに値を設定
				echo "<td>" . $resultMagicSquare[$i][$j] . "</td>";
			}
			
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>
</html>
