<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>実数の指数表現</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'normalization']));
	echo "値1";
	echo $this->Form->text('indexNum', array('maxlength' => '50'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	
	echo "<br />正規化後 ： " . $resultNormalization;
	?>
</body>
</html>
