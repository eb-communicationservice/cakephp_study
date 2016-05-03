<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utils\CalcurateAlgorithm;
use App\Utils\Validate;
use App\Utils\AlgorithmUtils;

class AlgorithmController extends AppController
{
	
	/*
	* 1.四捨五入
	*/
	public function round(){
		
		// フォームから値を取得
		$inputArray = array('roundNum' => $this->request->data('roundNum'), 
						'keta' => $this->request->data('keta'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 数字判定実行
		$isNumeric = Validate::isNumeric($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultRound', "");
		
		// 入力値に数字ではない値が含まれている場合
		} elseif (!$isNumeric) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "数字を入力して下さい");
			$this->set('resultRound', "");
		
		// 入力値数字の場合
		} else {
			
			// 四捨五入処理実行
			$resultRound = CalcurateAlgorithm::calcRound($inputArray['roundNum'], $inputArray['keta']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultRound', $resultRound);
		}
    }
    
    /*
    * 2.ローレル指数
    */
    public function laurel(){
		
		// フォームから値を取得
		$inputArray = array('weight' => $this->request->data('weight'), 
						'hight' => $this->request->data('hight'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 数字判定実行
		$isNumeric = Validate::isNumeric($inputArray);
		
		// 負の数判定実行
		$isPositiveNum = Validate::isPositiveNum($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultLaurel', "");
			$this->set('resultJudge', "");
		
		// 入力値に数字ではない値が含まれている場合
		} elseif (!$isNumeric) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "数字を入力して下さい");
			$this->set('resultLaurel', "");
			$this->set('resultJudge', "");
		
		// 入力値に負の数含まれている場合
		} elseif (!$isPositiveNum) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "正の数をを入力して下さい");
			$this->set('resultLaurel', "");
			$this->set('resultJudge', "");
		
		// 入力値正の数の場合
		} else {
			
			// ローレル指数の計算実行
			$resultLaurel = CalcurateAlgorithm::calcLaurel($inputArray['weight'], $inputArray['hight']);
			
			$resultJudge = AlgorithmUtils::judgeLaurel($resultLaurel);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultLaurel', $resultLaurel);
			$this->set('resultJudge', $resultJudge);
		}
    }
    
    /*
    * 3.最大公約数
    */
    public function gcm(){
		
		// フォームから値を取得
		$inputArray = array('num1' => $this->request->data('num1'), 
						'num2' => $this->request->data('num2'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 正の整数判定実行
		$isPositiveInteger = Validate::isPositiveInteger($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultGcm', "");
		
		// 正の整数ではない値が含まれている場合
		} elseif (!$isPositiveInteger) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "正の整数を入力して下さい");
			$this->set('resultGcm', "");
		
		// 入力値が正の整数の場合
		} else {
			
			// 最大公約数計算実行
			$resultGcm = CalcurateAlgorithm::calcGcm($inputArray['num1'], $inputArray['num2']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultGcm', $resultGcm);
		}
	}
	
	/*
	* 4.最小公倍数
	*/
	public function lcm(){
		
		// フォームから値を取得
		$inputArray = array('num1' => $this->request->data('num1'), 
						'num2' => $this->request->data('num2'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 正の整数判定実行
		$isPositiveInteger = Validate::isPositiveInteger($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultLcm', "");
		
		// 正の整数ではない値が含まれている場合
		} elseif (!$isPositiveInteger) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "正の整数を入力して下さい");
			$this->set('resultLcm', "");
		
		// 入力値が正の整数の場合
		} else {
			
			// 最大公約数計算実行
			$resultLcm = CalcurateAlgorithm::calcLcm($inputArray['num1'], $inputArray['num2']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultLcm', $resultLcm);
		}
    }

	/*
	* 5.階乗
	*/
	public function factorial(){
		
		// フォームから値を取得
		$inputArray = array('factorialNum' => $this->request->data('factorialNum'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 正の整数判定実行
		$isPositiveInteger = Validate::isPositiveInteger($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultFactorial', "");
		
		// 正の整数ではない値が含まれている場合
		} elseif (!$isPositiveInteger) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "正の整数を入力して下さい");
			$this->set('resultFactorial', "");
		
		// 入力値が正の整数の場合
		} else {
			
			// 指数計算実行
			$resultFactorial = CalcurateAlgorithm::calcFactorial($inputArray['factorialNum']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultFactorial', $resultFactorial);
		}
	}
	
	/*
	* 6.素数（エラストテネスのふるい）
	*/
	public function prime(){
		
		// 配列の2～100までに0の値を格納する
		$primeArray = array_fill(2,100,0);
		
		// 素数計算実行
		$resultPrime = CalcurateAlgorithm::calcPrime($primeArray);
		
		// viewに結果を送信
		$this->set('resultPrime', $resultPrime);
    }
   
    /*
	* 7.データの種類
	*/
	public function dataType(){
		
		// 任意の値を配列に格納（判定する数値データ）
		$numArray = array(10, 60, 20, 40, 60, 50, 20, 80, 60, 40);
		
		// データタイプの初期値として、0を上記任意値の数分配列に格納
		$cntArray = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		
		// 1行目を判定数値データ、2行目にデータタイプを設定
		$dataList = array($numArray, $cntArray);
		
		// データ種類判定実行
		$resultDataTypeList = AlgorithmUtils::judgeDataType($dataList);
		
		// viewに結果を送信
		$this->set('resultDataTypeList', $resultDataTypeList);
    }
}