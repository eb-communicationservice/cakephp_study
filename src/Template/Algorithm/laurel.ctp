<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>ローレル指数</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'laurel']));
	echo "体重";
	echo $this->Form->text('weight', array('maxlength' => '5'));
	echo "身長";
	echo $this->Form->text('hight', array('maxlength' => '5'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	
	echo "<br />ローレル指数 ： " . $resultLaurel . "</br>";
	echo "判定結果     ： " . $resultJudge;
	?>
</body>
</html>
