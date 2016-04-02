<?php

class CalcurateAlgorithm extends AppModel {
	
	public $useTable = false;
	
	public function calcRound($num) {
		
		$resultRound;
		
		$roundNum = ($num - (int) $num) * 10;
		
		if ($roundNum < 5) {
			$resultRound = (int) $num;
		} else {
			$resultRound = (int) $num + 1;
		}
		
		return $resultRound;
	}
}