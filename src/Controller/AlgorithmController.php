<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utils\CalcurateAlgorithm;

class AlgorithmController extends AppController
{
	
	public function round(){
		
		// フォームから値を取得
		$roundNum = $this->request->data('roundNum');
		$keta = $this->request->data('keta');
		
		// フォームからの値が空の場合
		if ($roundNum == null || $keta == null) {
			
			// 結果を何も表示しないよう空白をviewに送信
			$this->set('resultRound', "");
		
		// フォームからの値があった場合
		} else {
			
			// 四捨五入処理実行
			$resultRound = CalcurateAlgorithm::calcRound($roundNum, $keta);
			
			// viewに結果を送信
			$this->set('resultRound', $resultRound);
		}
    }
    
    public function laurel(){
		
		// フォームから値を取得
		$weight = $this->request->data('weight');
		$hight = $this->request->data('hight');
		
		// フォームからの値が空の場合
		if ($weight == null || $hight == null) {
			
			// 結果を何も表示しないよう空白をviewに送信
			$this->set('laurel', "");
			$this->set('resultJudge', "");
		
		// フォームからの値があった場合
		} else {
			
			// ローレル指数の計算実行
			$resultLaurel = CalcurateAlgorithm::calcLaurel($weight, $hight);
			
			$resultJudge = CalcurateAlgorithm::judgeLaurel($resultLaurel);
			
			// viewに結果を送信
			$this->set('laurel', $resultLaurel);
			$this->set('resultJudge', $resultJudge);
		}
    }
    
    public function gcm(){
		
		// フォームから値を取得
		$num1 = $this->request->data('num1');
		$num2 = $this->request->data('num2');
		
		// フォームからの値が空の場合
		if ($num1 == null || $num2 == null) {
			
			// 結果を何も表示しないよう空白をviewに送信
			$this->set('resultGcm', "");
		
		// フォームからの値があった場合
		} else {
			
			// 最大公約数計算実行
			$resultGcm = CalcurateAlgorithm::calcGcm($num1, $num2);
			
			// viewに結果を送信
			$this->set('resultGcm', $resultGcm);
		}
	}
	
	public function lcm(){
		
		// フォームから値を取得
		$num1 = $this->request->data('num1');
		$num2 = $this->request->data('num2');
		
		// フォームからの値が空の場合
		if ($num1 == null || $num2 == null) {
			
			// 結果を何も表示しないよう空白をviewに送信
			$this->set('resultLcm', "");
		
		// フォームからの値があった場合
		} else {
			
			// 最大公約数計算実行
			$resultLcm = CalcurateAlgorithm::calcLcm($num1, $num2);
			
			// viewに結果を送信
			$this->set('resultLcm', $resultLcm);
		}
    }
}