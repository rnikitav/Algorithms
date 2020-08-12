<?php
const DICTIONARY = [
    '[' => ']',
    '(' => ')',
    '{' => '}',
    '"' => '"',
    "'" => "'",
];
$a = "{[][()]}";    // true
$b = '((a + b)/ c) - 2';// true
$c = "([ошибка)";// false
$d = '"(")'; //false

function findBrackets($str , $dic)
{
    $stack = new SplDoublyLinkedList();
    $dictionary = $dic;
    $openBrackets = array_keys($dictionary);
    $closeBrackets = array_values($dictionary);

    foreach (str_split($str) as $symbol){
        if (in_array($symbol, $openBrackets) or in_array($symbol, $closeBrackets)){
            $stack->push($symbol);
        }
    }

    if ($dictionary[$stack->bottom()] == $stack->top()){
        $stack->pop();
        $stack->shift();
    }
    if ($stack->count() == 0){
//        echo 'success';
        return 'true';
    }
    return  resFindBrackets($stack, $dictionary, $closeBrackets);
}

function resFindBrackets(SplDoublyLinkedList $stack, $dictionary, $closeBrackets)
{
    $stack->rewind();
    while ($stack->valid()){
        if ($stack->current() == '"'){
            $quotationMarks = new SplDoublyLinkedList();
            while ($stack->valid()){
                $stack->next();
                if ($stack->current() != '"'){
                    $quotationMarks->push($stack->current());
                    continue;
                }
                else {
                    break;
                }
            }
            return resFindBrackets($quotationMarks, $dictionary, $closeBrackets);
        }
        if (in_array($stack->current(), $closeBrackets))
        {
            if ($stack->key() == 0){
                return 'false';
            }
            $thisSymbol = $stack->current();
            $thisSymbolKey = $stack->key();
            $stack->prev();
            $prevSymbol = $stack->current();
            if ($dictionary[$prevSymbol] == $thisSymbol){
                $stack->offsetUnset($thisSymbolKey);
                $stack->offsetUnset($thisSymbolKey - 1);
                if ($stack->count() == 0){
                    return 'true';
                }
                $stack->rewind();
                continue;
            }
        }
        $stack->next();
    }
    if ($stack->count() >0 ){
        return 'false';
    }
    return 'true';
}


$res = findBrackets($a, DICTIONARY);
echo 'Выражение ' . '<b>' . $a . '</b>' . ' Баланс скобок равен: ' . $res . '<br>';
$res = findBrackets($b, DICTIONARY);
echo 'Выражение ' . '<b>' . $b . '</b>' . ' Баланс скобок равен: ' . $res . '<br>';
$res = findBrackets($c, DICTIONARY);
echo 'Выражение ' . '<b>' . $c . '</b>' . ' Баланс скобок равен: ' . $res . '<br>';
$res = findBrackets($d, DICTIONARY);
echo 'Выражение ' . '<b>' . $d . '</b>' . ' Баланс скобок равен: ' . $res . '<br>';
