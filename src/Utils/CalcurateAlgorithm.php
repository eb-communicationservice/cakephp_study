<?php
namespace App\Utils;

/**
 * AppUtility.
 */
class CalcurateAlgorithm
{
	/*
	* 四捨五入処理
	*/
	public static function calcRound($roundNum, $keta){
	
		// 四捨五入したい桁数を整数部分の1桁目移動、0.5を足した後整数化
		$resultRound = (int)($roundNum * (pow(10, $keta)) + 0.5);
		$keta2 = pow(10, $keta);
		
		// 元の少数点位置に戻す
		$resultRound /= (pow(10, $keta));
		
		// 四捨五入結果を返す
		return $resultRound;
	}
	
	/*
	* ローレル指数計算
	*/
	public static function calcLaurel($weight, $hight){
		
		// ローレル指数計算
		$resultLaurel = ($weight / pow($hight, 3)) * pow(10, 7);
		
		// ローレル指数結果を返す
		return $resultLaurel;
	}
	
	/*
	* ローレル値から体型判定
	*/
	public static function judgeLaurel($resultLaurel){
		
		// 初期値としてローレル指数が160以上出た場合のステータスを設定
		$resultJudge = "太りすぎ";
		
		// 計算結果から体型判定
		// ローレル指数が100未満の場合
		if ($resultLaurel < 100) {
			$resultJudge = "痩せすぎ";
		
		// ローレル指数が100以上115未満の場合
		} elseif ($resultLaurel > 99 && $resultLaurel < 115) {
			$resultJudge = "やや痩せすぎ";
		
		// ローレル指数が115以上150未満の場合
		} elseif ($resultLaurel > 114 && $resultLaurel < 150) {
			$resultJudge = "平均";
		
		// ローレル指数が150以上160未満の場合
		} elseif ($resultLaurel > 149 && $resultLaurel < 160) {
			$resultJudge = "やや太りぎみ";
		}
		
		return $resultJudge;
	}
	
	/*
	* 最大公約数計算
	*/
	public static function calcGcm($num1, $num2){
		
		$big = $num2;
		$small = $num1;
		
		// 入力値の大小判定
		if ($num1 > $num2) {
			$big = $num1;
			$small = $num2;
		}
		
		// 大きい値/小さい値の余りが0になるまで繰り返し処理
		while ($big % $small != 0) {
			
			// 大きい値/小さい値の余りを変数に代入
			$remainder = $big % $small;
			
			// 小さい値を割られる値に、余りを小さい値に代入
			$big = $small;
			$small = $remainder;
		}
		
		return $small;
	}
	
	/*
	* 最小公倍数計算
	*/
	public static function calcLcm($num1, $num2){
		
		$gcm = CalcurateAlgorithm::calcGcm($num1, $num2);
		
		$resultLcm = ($num1 * $num2) / $gcm;
		
		return $resultLcm;
	}
}