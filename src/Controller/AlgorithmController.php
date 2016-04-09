<?php
namespace App\Controller;

use App\Controller\AppController;

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
			
			// モデルにロジック書いて呼び出そうとしたが、databaseアクセスしてねみたいなエラーが出てきたので、とりあえずやってないです。。
			// $this->loadModel('CalcurateAlgorithm');
			// $resultRound = $this->CalcurateAlgorithm->calcRound($roundNum, $keta);
			
			$resultRound;
			
			// 四捨五入処理
			// 四捨五入したい桁数を整数部分の1桁目移動、0.5を足した後整数化
			$resultRound = (int)($roundNum * (pow(10, $keta)) + 0.5);
			$keta2 = pow(10, $keta);
			
			// 元の少数点位置に戻す
			$resultRound /= (pow(10, $keta));
			
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
		
			$resultJudge;
			
			// ローレル指数の計算
			$laurel = ($weight / pow($hight, 3)) * pow(10, 7);
			
			// 計算結果から体型判定
			// ローレル指数が100未満の場合
			if ($laurel < 100) {
				$resultJudge = "痩せすぎ";
			
			// ローレル指数が100以上115未満の場合
			} elseif ($laurel > 99 && $laurel < 115) {
				$resultJudge = "やや痩せすぎ";
			
			// ローレル指数が115以上150未満の場合
			} elseif ($laurel > 114 && $laurel < 150) {
				$resultJudge = "平均";
			
			// ローレル指数が150以上160未満の場合
			} elseif ($laurel > 149 && $laurel < 160) {
				$resultJudge = "やや太りぎみ";
			
			// ローレル指数が160以上の場合
			} else {
				$resultJudge = "太りすぎ";
			}
			
			// viewに結果を送信
			$this->set('laurel', $laurel);
			$this->set('resultJudge', $resultJudge);
		}
    }
}