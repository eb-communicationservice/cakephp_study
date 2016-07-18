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
	
	/*
	* 11.逐次探索
	* 逐次探索実行
	*/
	public static function exeSeqSearch($seqSearchNum, $numArray){
		
		// 探索を行う配列を生成
		// コントローラーから渡された配列を探索用の配列に代入
		$seqSearchNumArray = $numArray;
		// 配列の一番最後に入力値を追加
		array_push($seqSearchNumArray, $seqSearchNum);
		
		// カウンタの初期化
		$resultSeqSearch = 0;
		
		// 配列の値と入力値が等しくなるまで繰り返し実行
		while ($seqSearchNumArray[$resultSeqSearch] != $seqSearchNum) {
			
			// 隣の配列値をみるために1追加
			$resultSeqSearch += 1;
		}
		
		// 配列と入力値の値が等しくなる位置が、配列の一番最後（入力値を追加した位置）だった場合
		if ($resultSeqSearch == count($numArray)) {
			
			// 配列内には入力値がなかったということで、-1を結果に代入
			$resultSeqSearch = -1;
		}
		
		return $resultSeqSearch;
	}
	
	/*
	* 12.数の挿入
	* 数の挿入実行
	*/
	public static function exeInsert($insertNum, $insertArray){
		
		// 数挿入の結果を表示する配列を生成
		// コントローラーから渡された配列を結果格納用の配列に代入
		$resultInsertArray = $insertArray;
		
		// 配列の要素と挿入したい値の大小関係を順番に見ていく
		for ($i = count($resultInsertArray) - 1; $i >= 0; $i--) {
			
			// 指定の配列番号の１つ後ろに、指定の配列番号に格納されている値をコピー
			$resultInsertArray[$i + 1] = $resultInsertArray[$i];
			
			// 現在見ている配列要素の値が挿入したい値より大きい場合
			if ($resultInsertArray[$i] > $insertNum) {
				
				// コピーした場所に挿入したい値を代入
				$resultInsertArray[$i + 1] = $insertNum;
				
				// 挿入し終わったらfor文を抜ける
				break;
			
			// 配列の先頭まで繰り返されていた場合
			}elseif ($i == 0) {
				
				// 挿入したい値が一番大きいため、先頭に代入
				$resultInsertArray[$i] = $insertNum;
			}
		}
		
		return $resultInsertArray;
	}
	
	/*
	* 13.二分探索
	* 二分探索実行
	*/
	public static function exeBinarySearch($binarySearchNum, $binarySearchArray){
		
		// 探索で使う、各値を初期化
		// 最大値：探索配列最後尾の配列番号
		$max = count($binarySearchArray) - 1;
		
		// 最小値：探索配列先頭の配列番号
		$min = 0;
		
		// 結果を格納する変数（初期値は一致する値がないときに格納する-1にしておく）
		$resultSearch = -1;
		
		// 最小値と最大値が逆転するまで繰り返し探索実行
		while($min <= $max) {
			
			// 中心の値を求める。（intにキャストし、中心の値を少数にならないようにする）
			$center = (int)(($max + $min) / 2);
			
			// 指定した範囲の配列の中心にある値が入力値と等しい場合
			if ($binarySearchArray[$center] == $binarySearchNum) {
				
				// 指定した配列番号を結果に格納
				$resultSearch = $center;
				
				// 探索結果がわかったため、while文を抜ける
				break;
			
			// 指定した範囲の配列の中心にある値が、入力地よりも大きい場合
			} elseif ($binarySearchArray[$center] > $binarySearchNum) {
				
				// 探索値は指定した範囲より小さい範囲に存在するため、最大値を中心値-1に指定する
				$max = $center -1;
			
			// 指定した範囲の配列の中心にある値が、入力地よりも小さい場合
			} else {
				
				// 探索値は指定した範囲より大きい範囲に存在するため、最小値を中心値+1に指定する
				$min = $center + 1;
			}
		}
		
		return $resultSearch;
	}
	
	/*
	* 15.バブルソート
	* バブルソート実行
	*/
	public static function execBubbleSort($sortArray){
		
		do {
			
			// 交換有無フラグ　true:交換あり false:交換なし
			// 交換有無フラグをfalse（交換なし）に設定
			$switch = false;
			
			// 対象の列の値を、繰り返し判定
			for ($i = 0; $i < count($sortArray) - 1; $i++) {
				
				// 注目している値と隣の値を見比べた結果、注目している値の方が大きい場合
				if ($sortArray[$i] > $sortArray[$i + 1]) {
					
					// 注目している値とその隣の値を入れ替える
					$swap = $sortArray[$i];
					$sortArray[$i] = $sortArray[$i + 1];
					$sortArray[$i + 1] = $swap;
					
					// 交換有無フラグをtrue（交換あり）に設定
					$switch = true;
				}
			}
		// 交換する値がなくなる（交換フラグがfalse（交換なし）になる）まで繰り返し処理
		} while ($switch == true);
		
		return $sortArray;
	}
}