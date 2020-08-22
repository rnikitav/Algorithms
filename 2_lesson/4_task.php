<?php
function getPrimeDivisor($num)
{
    if ($num > 10){
        if ($num % 2 === 0 or $num % 10 === 5){
            return false;
        }
    }
    $maxRange = (sqrt($num) + 1);
    for ($n = 2; $n < $maxRange; $n++){
        if ($num % $n === 0){
            return false;
        }
    }
    return true;

}

function getCountPrimeDivision($count){
    if ($count === 0){
        return 'Число должно быть больше 0';
    }
    $primeNumbers = new SplStack();
    $primeNumbers->push(2);
//    $primeNumbers = [2];
    $nextNumber = 3;
    while (count($primeNumbers) < $count){
        if (getPrimeDivisor($nextNumber)){
            $primeNumbers->push($nextNumber);
//            array_push($primeNumbers, $nextNumber);
        }
        $nextNumber += 2;
    }
    return $primeNumbers;
}

$start = microtime(true);
$before = memory_get_usage();



$userNumber = 10001;
$res = getCountPrimeDivision($userNumber);
//echo $res["count($res - 1)"] . '<br>';
echo '<p>' . $userNumber . 'ым простым числом будет = ' . $res->top() . '</p>' . '<hr>';

echo microtime(true) - $start; //0.91010189056396
echo PHP_EOL;
echo memory_get_usage() - $before; // 400240
echo PHP_EOL;
