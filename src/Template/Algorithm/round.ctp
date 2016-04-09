<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'round']));
	echo "四捨五入する値";
	echo $this->Form->text('roundNum', array('maxlength' => '10'));
	echo "四捨五入したい桁数";
	echo $this->Form->text('keta', array('maxlength' => '2'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo "結果 ： " . $resultRound;
	?>
</body>
</html>
