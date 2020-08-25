<?php
// поиск числа с повторением
function binarySearch($myArray, $num)
{
    $start = 0;
    $end = count($myArray) - 1;
    $n = 0;
    $findEl = 0;

    while ($start <= $end) {
        $n++;
        $base = floor(($start + $end) / 2);
        echo "Проверяется элемент с индексом: $base" . PHP_EOL;

        if ($myArray[$base] == $num) {
            if (($myArray[$base - 1] == $num && $myArray[$base + 1] == $num)){
                if ($myArray[0] == $num && $myArray[$end] == $num){
                    $findEl = count($myArray);
                    return $findEl;
                }
                $findEl += 3;
                array_splice($myArray, $base - 1, 3);
                $end = count($myArray) - 1;
                continue;
            }
            echo "Количество итераций: $n искомого числа $num под индексом $base " . PHP_EOL;
            $findEl++;
            array_splice($myArray, $base, 1);
            if ($end < count($myArray) -1){
                $end--;
                continue;
            }
            $end = count($myArray) - 1;
        } elseif ($myArray[$base] < $num) {
            $start = $base + 1;
        } else {
            $end = $base - 1;
        }
    }
    if ($findEl > 0 ){
        return $findEl;
    }
    echo "ЧИСЛО НЕ НАйДЕНО. Количество итераций: $n" . PHP_EOL;
    return null;
}

//var_dump($res = binarySearch([4,4,4,4,4,4,4,4,4,4], 4));  // => 10
$res = binarySearch([4,4,4,4,4,5,6,7], 4);  // => 5
//$res = binarySearch([1,2,3,4,4,5,6,7], 4);  // => 2
