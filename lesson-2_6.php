<?php

function power($val, $pow){
    if($pow == 0){return 1;}
    if($pow > 0) {return $val * power($val,--$pow);}
    return 'Степень не может быть отрицательной';
}

var_dump(power(2,4));