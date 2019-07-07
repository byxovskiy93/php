<?php

$a = 5;
$b = 4;

function firsTask($a,$b){
    if($a >= 0 and $b >= 0) return $a - $b;
    if($a < 0 and $b < 0) return $a * $b;
    return $a + $b;
}

var_dump(firsTask($a,$b));
