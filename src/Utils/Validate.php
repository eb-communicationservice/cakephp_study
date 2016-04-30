<?php
namespace App\Utils;

/**
 * AppUtility.
 */
class Validate
{
	/*
	* 空判定
	* true = 空ではない, false = 空
	*/
	public static function isEmpty($inputArray){
		
		$isEmpty = true;
		
		// 引数の配列にある値（入力値）を繰り返し判定
		foreach((array)$inputArray as $inputKey => $inputValue) {
			
			// 入力値が空だった場合
			if (empty($inputValue)) {
			
				// 判定結果を空あり（false）に変更
				$isEmpty = false;
				
				// 空があった時点でループを抜ける
				break;
			}
		}
		
		// 判定結果を返す
		return $isEmpty;
	}
	
	/*
	* 数字判定
	* true = 数字, false = 数字ではない値
	*/
	public static function isNumeric($inputArray){
		
		$isNumeric = true;
		
		// 引数の配列にある値（入力値）を繰り返し判定
		foreach((array)$inputArray as $inputKey => $inputValue) {
			
			// 入力値が数字ではない場合
			if (!is_numeric($inputValue)) {
				
				// 判定結果を数字ではない（false）に変更
				$isNumeric =false;
				
				// 数字ではない値があった時点でループを抜ける
				break;
			}
		}
		
		// 判定結果を返す
		return $isNumeric;
	}
	
	/*
	* 正の数判定
	* true = 正の数, false = 負の数
	*/
	public static function isPositiveNum($inputArray){
		
		$isPositiveNum = true;
		
		// 引数の配列にある値（入力値）を繰り返し判定
		foreach((array)$inputArray as $inputKey => $inputValue) {
			
			// 入力値が数字の場合
			if (Validate::isNumeric($inputValue)) {
				
				// 入力値が負の数である場合
				if ($inputValue < 0) {
				
					// 判定結果を負の数（false）に変更
					$isPositiveNum =false;
					
					// 負の数がある時点でループを抜ける
					break;
				}
			}
		}
		
		// 判定結果を返す
		return $isPositiveNum;
	}
	
	/*
	* 正の整数判定
	* true = 正の整数, false = 正の整数ではない値
	*/
	public static function isPositiveInteger($inputArray){
		
		$isPositiveInteger = true;
		
		// 引数の配列にある値（入力値）を繰り返し判定
		foreach((array)$inputArray as $inputKey => $inputValue) {
			
			// 入力値が正の整数ではない場合
			if (!ctype_digit(strval($inputValue))) {
				
				// 判定結果を正の整数ではない（false）に変更
				$isPositiveInteger =false;
				
				// 正の整数でない値があった時点でループを抜ける
				break;
			}
		}
		
		// 判定結果を返す
		return $isPositiveInteger;
	}
}