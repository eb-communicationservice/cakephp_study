<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>駅間の距離</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'stationDistance']));
	echo "駅名①";
	echo $this->Form->text('startStation', array('maxlength' => '20'));
	echo "駅名②";
	echo $this->Form->text('endStation', array('maxlength' => '20'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	echo "<br />結果 ： " . $stationDistance;
	?>
</body>
</html>