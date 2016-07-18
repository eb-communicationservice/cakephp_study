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
		
		// セットする配列の始まりと終わりを決める（今回は2～100）
		$startValue = 2;
		$endValue = 100;
		
		// 素数計算実行
		$resultPrime = CalcurateAlgorithm::calcPrime($startValue,$endValue);
		
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
    
	/*
	* 8.奇数の魔方陣
	*/
	public function magicSquare(){
		
		// フォームから値を取得
		$inputArray = array('magicSquareNum' => $this->request->data('magicSquareNum'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 正の整数判定実行
		$isPositiveInteger = Validate::isPositiveInteger($inputArray);
		
		// 奇数判定実行
		$isOdd = Validate::isOdd($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultMagicSquare', "");
		
		// 正の整数ではない値が含まれている場合
		} elseif (!$isPositiveInteger) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "正の整数を入力して下さい");
			$this->set('resultMagicSquare', "");
		
		} else if (!$isOdd) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "奇数を入力して下さい");
			$this->set('resultMagicSquare', "");
		
		// 入力値が自然数で奇数の場合
		} else {
			
			// 魔方陣実行
			$resultMagicSquare = AlgorithmUtils::makeMagicSquare($inputArray['magicSquareNum']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultMagicSquare', $resultMagicSquare);
		}
	}
	
	/*
	* 9.実数の指数表現
	*/
	public function normalization(){
		
		// フォームから値を取得
		$inputArray = array('indexNum' => $this->request->data('indexNum'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 数字判定実行
		$isNumeric = Validate::isNumeric($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('resultNormalization', "");
		
		// 入力値に数字ではない値が含まれている場合
		} elseif (!$isNumeric) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "数字を入力して下さい");
			$this->set('resultNormalization', "");
		
		// 入力値数字の場合
		} else {
			
			// 正規化実行
			$resultNormalization = CalcurateAlgorithm::calcNormalization($inputArray['indexNum']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultNormalization', $resultNormalization);
		}
	}
	
	/*
	* 10.駅間の距離
	*/
	public function stationDistance(){
		
		// フォームから値を取得
		$inputArray = array('startStation' => $this->request->data('startStation'),
							'endStation' => $this->request->data('endStation'));
		
		// 駅名と距離の配列を定義
		$stationList = array('森岡' => 535.3,
							'木巻' => 500.0,
							'西上' => 487.5,
							'栗駒' => 416.2,
							'新川' => 395.0,
							'富島' => 272.8,
							'白川' => 185.4,
							'野宮' => 109.5,
							'小宮' => 30.3,
							'西京' => 0.0);
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 入力値（駅名①）がリストに存在するかの判定実行
		$isExistStartStation = Validate::isExistInList($inputArray['startStation'], $stationList);
		
		// 入力値（駅名②）がリストに存在するかの判定実行
		$isExistendStation = Validate::isExistInList($inputArray['endStation'], $stationList);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "全ての項目に値を入力して下さい");
			$this->set('stationDistance', "");
		
		// リストに存在しない入力値が来た場合
		} elseif (!$isExistStartStation || !$isExistendStation) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "リストに存在しない駅名が入力されています。");
			$this->set('stationDistance', "");
		
		// 入力値に問題がない場合
		} else {
			
			// 駅間距離算出実行
			$stationDistance = algorithmUtils::stationDistance($stationList, $inputArray['startStation'], $inputArray['endStation']);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('stationDistance', $stationDistance);
		}
	}
	
	/*
	* 11.逐次探索
	*/
	public function sequentialSearch(){
		
		$numArray = array(1, 8, 10, 2, -5, 4);
		
		// フォームから値を取得
		$inputArray = array('seqSearchNum' => $this->request->data('seqSearchNum'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 数字判定実行
		$isNumeric = Validate::isNumeric($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('numArray', $numArray);
			$this->set('errorMsg', "値を入力して下さい");
			$this->set('resultSeqSearch', "");
		
		// 入力値に数字ではない値が含まれている場合
		} elseif (!$isNumeric) {
			
			// エラーメッセージ入力
			$this->set('numArray', $numArray);
			$this->set('errorMsg', "数字を入力して下さい");
			$this->set('resultSeqSearch', "");
		
		// 入力値数字の場合
		} else {
			
			// 逐次探索実行
			$resultSeqSearch = AlgorithmUtils::exeSeqSearch($inputArray['seqSearchNum'], $numArray);
			
			// viewに結果を送信
			$this->set('numArray', $numArray);
			$this->set('errorMsg', "");
			$this->set('resultSeqSearch', $resultSeqSearch);
		}
    }
    
    /*
	* 12.数の挿入
	*/
	public function insert(){
		
		$insertArray = array(94, 84, 76, 65, 58);
		
		// フォームから値を取得
		$inputArray = array('insertNum' => $this->request->data('insertNum'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 数字判定実行
		$isNumeric = Validate::isNumeric($inputArray);
		
		// 挿入する配列をviewにセット
		$this->set('insertArray', $insertArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "値を入力して下さい");
		
		// 入力値に数字ではない値が含まれている場合
		} elseif (!$isNumeric) {
			
			// エラーメッセージ入力
			$this->set('errorMsg', "数字を入力して下さい");
		
		// 入力値数字の場合
		} else {
			
			// 数の挿入実行
			$resultInsertArray = AlgorithmUtils::exeInsert($inputArray['insertNum'], $insertArray);
			
			// viewに結果を送信
			$this->set('errorMsg', "");
			$this->set('resultInsertArray', $resultInsertArray);
		}
    }
    
     /*
	* 14.シーザー暗号
	*/
	public function caesarCipher(){
		
		// フォームから値を取得
		$inputArray = array('msg' => $this->request->data('msg'));
		
		// 空判定実行
		$isEmpty = Validate::isEmpty($inputArray);
		
		// 入力値に空が含まれている場合
		if (!$isEmpty) {
			
			// エラーメッセージ出力
			$this->set('errorMsg', "値を入力して下さい");
		
		// 入力値数字の場合
		} else {
			
			// シーザー暗号実行
			$afterCipherMsg = AlgorithmUtils::exeCaesarCipher($inputArray['msg']);
			
			// シーザー暗号実行の結果、入力値に大文字英字・スペースではない文字が含まれていた場合
			if ($afterCipherMsg == "not alpha") {
				
				// エラーメッセージ入力
				$this->set('errorMsg', "大文字英字、スペースのみを入力して下さい");
			// シーザー暗号が問題なく実行された場合
			} else {
				
				// viewに結果を送信
				$this->set('errorMsg', "");
				$this->set('afterCipherMsg', $afterCipherMsg);
			}
			
			// viewに結果を送信
			// $this->set('afterCipherMsg', $afterCipherMsg);
		}
    }
}