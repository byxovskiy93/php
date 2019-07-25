<?php
function plus($arg1,$arg2){
    return $arg1 + $arg2;
}

function minus($arg1,$arg2){
    return $arg1 - $arg2;
}

function division ($arg1,$arg2){
    return ($arg2 == 0) ? 'Деление на 0 невозможно!' : $arg1 / $arg2;
}

function multiplication ($arg1,$arg2){
    return $arg1 * $arg2;
}

function calculate ($arg1,$arg2,$operation){
    switch ($operation){
        case 'addition':
            return plus($arg1,$arg2);
        case 'subtraction':
            return minus($arg1,$arg2);
        case 'multiplication':
            return multiplication($arg1,$arg2);
        case 'division':
            return division($arg1,$arg2);
        case '+':
            return plus($arg1,$arg2);
        case '-':
            return minus($arg1,$arg2);
        case '*':
            return multiplication($arg1,$arg2);
        case '/':
            return division($arg1,$arg2);
    }
}
