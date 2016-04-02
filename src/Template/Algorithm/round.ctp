<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'round']));
	echo $this->Form->text('roundNum', array('size' => '5'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	?>
	<?php echo $resultRound; ?>
</body>
</html>
