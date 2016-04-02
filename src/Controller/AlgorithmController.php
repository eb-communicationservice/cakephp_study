<?php
namespace App\Controller;

use App\Controller\AppController;

class AlgorithmController extends AppController
{
	
	public function round(){
		
		// フォームから値を取得
		$roundNum = $this->request->data('roundNum');
		
		// モデルにロジック書いて呼び出そうとしたが、databaseアクセスしてねみたいなエラーが出てきたので、とりあえずやってないです。。
		// $this->loadModel('CalcurateAlgorithm');
		// $resultRound = $this->CalcurateAlgorithm->calcRound($roundNum);
		
		$resultRound;
		
		// 小数点第一位の値を取得
		$firstPoint = ($roundNum - (int) $roundNum) * 10;
		
		// 四捨五入処理
		// 小数点第一位が5より小さい場合：切り捨て（intにキャスト）
		// 小数点第一位が5以上の場合：切り上げ処理
		if ($firstPoint < 5) {
			$resultRound = (int) $roundNum;
		} else {
			$resultRound = (int) $roundNum + 1;
		}
		
		// viewに結果を送信
		$this->set('resultRound', $resultRound);
    }
}