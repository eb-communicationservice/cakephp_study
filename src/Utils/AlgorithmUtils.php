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
	
	/*
	* 8.奇数の魔方陣
	* 魔方陣生成
	*/
	public static function makeMagicSquare($magicSquareNum){
		
		// 最初の値(1)を格納する列番号を設定(全体列数の真ん中)
		$column = (int)($magicSquareNum / 2);
		
		// 最初の値(1)を格納する行番号を設定(一番上)
		$row = 0;
		
		// 最初の値(1)を指定した場所に格納
		$magicSquareArray[$row][$column] = 1;
		
		// 存在するマス数分繰り返し、初期値以外の値を格納していく
		for ($i = 2; $i <= pow($magicSquareNum, 2); $i++) {
			
			// 格納する値÷入力値の余りが1である場合
			if ($i % $magicSquareNum == 1) {
				
				// 前回格納した場所の下になるよう行を指定
				$row += 1;
			
			// 格納する値÷入力値の余りが1以外の場合
			} else {
				
				// 前回格納した場所の右上になるよう行、列を指定
				$row -= 1;
				$column += 1;
			}
			
			// 指定した行が0行目より上にある場合
			if ($row < 0) {
				
				// 同じ列の一番下に格納できるように行を指定
				$row = $magicSquareNum - 1;
			}
			
			// 指定した列が入力した値の列数より右にある場合
			if ($column > ($magicSquareNum - 1)) {
				
				// 同じ行の先頭列に格納できるように列を指定
				$column = 0;
			}
			
			// 指定した場所に格納する値を格納
			$magicSquareArray[$row][$column] = $i;
		}
		
		return $magicSquareArray;
	}
	
	/*
	* 10.駅間の距離
	* 駅間の距離算出
	*/
	public static function stationDistance($stationList, $startStation, $endStation){
		
		// 駅名と距離のリストを繰り返し確認する
		foreach($stationList as $stationName => $distance) {
			
			// 入力値（駅名①）がリストに存在した場合
			if ($startStation == $stationName) {
				
				// 対象駅名の距離を開始距離として変数に代入する
				$startDistance = $distance;
			
			// 入力値（駅名②）がリストに存在した場合
			} elseif ($endStation == $stationName) {
				
				// 対象駅名の距離を終了距離として変数に代入する
				$endDistance = $distance;
			}
		}
		
		// 開始距離から終了距離を引いて出てきた距離の絶対値を求めて、算出結果用の変数に代入する
		$stationDistance = abs($startDistance - $endDistance);
		
		return $stationDistance;
	}
}