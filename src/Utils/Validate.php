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
	
	/*
	* 奇数判定
	* true = 奇数, false = 偶数
	*/
	public static function isOdd($inputArray){
		
		$isOdd = true;
		
		// 引数の配列にある値（入力値）を繰り返し判定
		foreach((array)$inputArray as $inputKey => $inputValue) {
			
			// 入力値が偶数の場合
			if ($inputValue % 2 == 0) {
				
				// 判定結果を偶数（false）に変更
				$isOdd =false;
				
				// 偶数であった時点でループを抜ける
				break;
			}
		}
		
		// 判定結果を返す
		return $isOdd;
	}
	
	/*
	* リストに指定値が存在するか判定
	* true = 存在する, false = 存在しない
	*/
	public static function isExistInList($inputValue, $list){
		
		$isExistInList = false;
		
		// 判定対象のリストを繰り返して判定
		foreach((array)$list as $listKey => $listValue) {
			
			// 入力値が判定対象リスト内に存在する場合
			if ($listKey == $inputValue) {
				
				// 判定結果を存在する（true）に変更
				$isExistInList = true;
				
				break;
			}
		}
		
		// 判定結果を返す
		return $isExistInList;
	}
	
	/*
	* 大文字英字、スペース判定
	* true = 大文字英字, false = 大文字英字、スペース以外の文字が含まれている
	*/
	public static function isUppercaseAlpha($msg){
		
		// 大文字英語とスペースが入った配列を用意
		$alphaList = ['A', 'B','C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', ' '];
		
		// 引数の文字に対して、一文字ずつ分解し、繰り返し比較
		foreach (str_split($msg) as $msgVal) {
			
			// 対象の文字が、大文字英語とスペースの入った配列に含まれていない場合
			if (!in_array($msgVal, $alphaList)) {
				
				// 判定結果を「大文字英字以外の文字が入っている」（false）で返す
				return false;
			}
		}
		
		// 判定結果を「大文字英字、スペースのみ入っている」（true）で返す
		return true;
	}
}