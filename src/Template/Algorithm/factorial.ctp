<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>階乗</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'factorial']));
	echo "階乗する値";
	echo $this->Form->text('factorialNum', array('maxlength' => '3'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	
	echo "<br />階乗結果 ： " . $resultFactorial;
	?>
</body>
</html>
