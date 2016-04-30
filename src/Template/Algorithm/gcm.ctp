<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>最大公約数</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'gcm']));
	echo "値1";
	echo $this->Form->text('num1', array('maxlength' => '3'));
	echo "値2";
	echo $this->Form->text('num2', array('maxlength' => '3'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	
	echo "<br />最大公約数 ： " . $resultGcm;
	?>
</body>
</html>
