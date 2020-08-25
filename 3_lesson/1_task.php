<?php
// нахождение пропущенного числа
function getMissedEl($arr)
{
    $num = 1;
    $start = 0;
    $end = count($arr) - 1;
    if (count($arr) === 0) {
        return $num;
    }
    if (count($arr) === 1){
        $end = 1;
    }
    while ($start < $end) {
        $base = floor(($start + $end) / 2);
        $res = $arr[$base];
        //  можно добавить проверку что если base == 0 чтобы  notice не выводило
        if (($arr[$base] - 1 != $arr[$base - 1]) or ($arr[$base - 1 ] != $res - 1)){
            return $arr[$base] - 1 ;
        }
        if ($arr[$base] + 1 != $arr[$base + 1]){
            return $arr[$base] + 1 ;
        }

        if ( $res < $arr[$res - 1]){
            $end = $base - 1;
        }
        else {
            $start = $base + 1;
        }
    }
    return 'Все числа по порядку';
}



$a = [1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16]; //=> 11
//$b = [1,2,3,4,   5, 6,7, 8,9,10,11,12,13,14,15,16,17,18, 20]; //=> 19
$b = [1, 2, 4, 5, 6]; //=> 3
//$c = [2]; // => 1
$c = [1,3]; // => 2

echo($res = getMissedEl($b));
