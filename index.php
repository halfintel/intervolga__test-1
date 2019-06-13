<?php
//массив
for ( $i = 0; $i < 1000; $i++ ){
	$arr[$i] = $i*2;
}
//число, индекс которого ищем
$needNumber = 996;

$needIndex = SearchNumberInArr($arr, $needNumber);
echo 'нужное число находится в ' . $needIndex . ' ячейке';

//функция поиска индекса числа в массиве
function SearchNumberInArr($arr, $needNumber){
	$arrLength = count($arr);
	if ( $arrLength > 1 ){
		$arrHalf = ceil( count($arr) / 2 );
		$arrNew = array_chunk($arr, $arrHalf, TRUE);
		$key = end( array_keys($arrNew[0]) );
		
		if ( $needNumber <= $arrNew[0][$key] ){
			return SearchNumberInArr($arrNew[0], $needNumber);
		} else {
			return SearchNumberInArr($arrNew[1], $needNumber);
		}

	} else {
		$needIndex = end( array_keys($arr) );
		return $needIndex;
	}
}
