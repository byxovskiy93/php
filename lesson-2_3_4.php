<?php

function plus($arg1,$arg2){
    return $arg1 + $arg2;
}

function minus($arg1,$arg2){
    return $arg1 - $arg2;
}

function division ($arg1,$arg2){
    return ($arg2 === 0) ? 'Деление на 0 невозможно!' : $arg1 / $arg2;
}

function multiplication ($arg1,$arg2){
    return $arg1 * $arg2;
}

function calculate ($arg1,$arg2,$operation){
    switch ($operation){
        case 'сложение':
            return plus($arg1,$arg2);
        case 'вычитание':
            return minus($arg1,$arg2);
        case 'умножение':
            return multiplication($arg1,$arg2);
        case 'деление':
            return division($arg1,$arg2);
        default:
            return 'Возможные операции: сложение,вычитание,умножение,деление';
    }
}

var_dump(calculate(5,0,'деление'));