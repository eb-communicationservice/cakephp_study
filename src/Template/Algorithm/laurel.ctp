﻿<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'laurel']));
	echo "体重";
	echo $this->Form->text('weight', array('maxlength' => '5'));
	echo "身長";
	echo $this->Form->text('hight', array('maxlength' => '5'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo "ローレル指数 ： " . $laurel . "</br>";
	echo "判定結果     ： " . $resultJudge;
	?>
</body>
</html>
