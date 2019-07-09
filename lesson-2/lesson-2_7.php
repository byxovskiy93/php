<?php

function getNowTime(){
 return getHour().' '.getMinute();
}

function getHour(){

    $hour = date('H');

    $number = (int)$hour;

    if ($number >= 11 && $number <= 19) {
        $text = 'часов';
        return $hour.' '.$text;
    }

    $i = $number % 10;

    switch ($i)
    {
        case (1): $text = 'час'; break;
        case (2):
        case (3):
        case (4): $text = 'часа'; break;
        default: $text = 'часов';
    }

    return $hour.' '.$text;
}

function getMinute(){

    $minute = date('i');

    $number = (int)$minute;

    if ($number >= 11 && $number <= 19) {
        $text = 'минут';
        return $minute.' '.$text;
    }

    $i = $number % 10;

    switch ($i)
        {
            case (1): $text = 'минута'; break;
            case (2):
            case (3):
            case (4): $text = 'минуты'; break;
            default: $text = 'минут';
    }

    return $minute.' '.$text;
}

var_dump(getNowTime());


