<?php
namespace App\Utils;

/**
 * AppUtility.
 */
class AlgorithmUtils
{
	/*
	* 2.ローレル指数
	* ローレル値からの体型判定
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
	* 7.データの種類
	* データの種類判定
	*/
	public static function judgeDataType($dataList){
		
		// データ番号を振っていくカウンタを宣言（初期値は0）
		$cnt = 0;
		
		// データ番号振り分け
		for ($i = 0; $i < count($dataList[0]); $i++) {
			
			// 2行目のデータタイプ行の値が0である場合
			if ($dataList[1][$i] == 0) {
				
				// カウンタを+1する
				$cnt += 1;
				
				// 該当のデータタイプにカウンタを設定
				$dataList[1][$i] = $cnt;
			}
			
			// 数値データの判定
			for ($j = $i + 1; $j < count($dataList[0]); $j++) {
				
				// i番目の数値データとj番目の数値データが等しい、かつデータイプが0の場合
				if ($dataList[0][$i] == $dataList[0][$j] && $dataList[1][$j] == 0) {
					// 該当のデータタイプに現在のカウンタを設定
					$dataList[1][$j] = $cnt;
				}
			}
		}
		
		// 四捨五入結果を返す
		return $dataList;
	}
}