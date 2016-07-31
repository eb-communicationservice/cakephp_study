<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h3>シーザー暗号</h3>
	<?php
	echo $this->Form->create(null, array('type' => 'post', 'url' => ['controller' => 'Algorithm', 'action' => 'caesarCipher']));
	echo "暗号化する値";
	echo $this->Form->text('msg', array('maxlength' => '50'));
	echo $this->Form->submit('送信');
	echo $this->Form->end();
	
	echo '<font color="#FF0000">' . $errorMsg . '</font>';
	
	// エラーメッセージが空だった場合
	if (empty($errorMsg)) {
		
		echo "<br />結果 ： " . $afterCipherMsg;
	}
	?>
</body>
</html>