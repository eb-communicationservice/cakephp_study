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
		// 整数化後、元の少数点位置に戻す
		$resultRound = ((int)($roundNum * (pow(10, $keta - 1)) + 0.5)) / (pow(10, $keta - 1));
		
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
		
		// 最大公約数を求める
		$gcm = CalcurateAlgorithm::calcGcm($num1, $num2);
		
		// 入力値を掛けた値を最大公約数で割る
		$resultLcm = ($num1 * $num2) / $gcm;
		
		return $resultLcm;
	}
	
	/*
	* 階乗計算
	*/
	public static function calcFactorial($factorialNum){
		
		// 階乗結果を入れる変数に、初期値として1を設定しておく
		$resultFactorial = 1;
		
		// 入力値として得た階乗する値分繰り返し処理
		for ($i = 2; $i <= $factorialNum; $i++) {
			
			// 処理回数（2～$factorialNum）を順番に掛け算を行う
			$resultFactorial *= $i;
		}
		
		return $resultFactorial;
	}
	
	/*
	* 素数計算
	*/
	public static function calcPrime($startValue, $endValue){
		
		// 引数を使い、配列startValue～endValueまでに0を格納する
		$primeArray = array_fill($startValue, $endValue, 0);
		
		// 結果を代入する変数に、空を初期値として代入しておく
		$resultPrime = "";
		
		// 2～100の平方根まで以下の処理を繰り返す
		for ($i = 2; $i <= sqrt(100); $i++) {
			
			// iの倍数を繰り返し判定する（素数判定）
			for ($j = $i * 2; $j <= 100; $j += $i) {
				
				// iの倍数は素数ではないため、印として該当箇所の値に1を代入
				$primeArray[$j] = 1;
			}
		}
		
		// 結果の格納
		for ($k = 2; $k <= 100; $k++) {
			
			// 配列の値が0（＝素数）の場合
			if ($primeArray[$k] == 0) {
				
				// 該当する配列の番号を結果の変数に代入
				$resultPrime = $resultPrime . $k . ", ";
			}
		}
		
		return $resultPrime;
	}
}