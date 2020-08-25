<?php
// сортировка слиянием 
function mergeSort($arr)
{
    $count = count($arr);
    if ($count <= 1){
        return $arr;
    }
    $middle = floor($count / 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left,$right);
}

function merge($left, $right)
{
    $res = [];
    while (count($left) > 0 && count($right) > 0){
        if ($left[0] < $right[0]){
            array_push($res, array_shift($left));
        }else{
            array_push($res, array_shift($right));
        }
    }
    $result = array_merge($res, $left);
    $result = array_merge($result, $right);
    return $result;
}


var_dump($res = mergeSort([2,1,6,0,5,3,7,4,9,8]));
