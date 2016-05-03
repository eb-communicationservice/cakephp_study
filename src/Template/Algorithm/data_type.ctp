<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>データの種類</h3>
	<table>
	<?php
	echo "<tr>";
	for ($i = 0; $i < count($resultDataTypeList[0]); $i++) {
		
		// 1行目の数値データを順番に表示
		echo "<td>" . $resultDataTypeList[0][$i] . "</td>";
	}
	echo "</tr>";
	echo "<tr>";
	for ($j = 0; $j < count($resultDataTypeList[0]); $j++) {
		
		// 2行目のデータタイプを順番に表示
		echo "<td>" . $resultDataTypeList[1][$j] . "</td>";
	}
	echo "</tr>";
	?>
	</table>
</body>
</html>
