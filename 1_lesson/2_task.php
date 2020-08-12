<?php

function getPrimeDivisor($num)
{
    $res = new SplStack();
    $maxRange = ceil($num / 2);
    $n = 2;
    if ($num == 1)
    {
        return $res;
    }
    while ($n <= $maxRange && $num != 1){
        if ($num % $n == 0){
            $num /= $n;
        }
        else {
            ++$n;
        }
    }
    $res->push($n);
    return $res;
}
$start = microtime(true);
$before = memory_get_usage();


//$res = getPrimeDivisor(13195);
$res = getPrimeDivisor(600851475143);
//$res = getPrimeDivisor(515);
if ($res->count() > 0){
    echo '<p>' .$res->top() . '</p>';
}
else {
    echo 'Не найдено';
}

echo microtime(true) - $start; //0.0010941028594971
echo PHP_EOL;
echo memory_get_usage() - $before; // 240
echo PHP_EOL;
