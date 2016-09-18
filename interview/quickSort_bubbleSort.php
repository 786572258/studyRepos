<?php
function quickSort($array) {
    $count = count($array);
    if ($count <= 1)
        return $array;
    $key = $array[0];
    $leftArr = array();
    $rightArr = array();
    for ($i = 1; $i < $count; $i++) {
        if ($array[$i] <= $key)
            $leftArr[] = $array[$i];
        else
            $rightArr[] = $array[$i];
    }
    $leftArr = quickSort($leftArr);
    $rightArr = quickSort($rightArr);
    return array_merge($leftArr, array($key), $rightArr);
}

//冒泡排序
function bubble_sort($array){
    $count = count($array);
    if ($count <= 0) return false;
    for($i=0; $i<$count-1; $i++){
        for($j=$i+1; $j<$count; $j++){
            if ($array[$i] > $array[$j]){
                $tmp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}

$array = array(5,9,7,6,3,2);
print_r(quickSort($array));
die;
