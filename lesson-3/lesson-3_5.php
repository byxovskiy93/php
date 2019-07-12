<?php

echo spaceReplace('test test test','-');

function spaceReplace($string,$simbol){
    $str = preg_replace('~[^-a-z0-9_]+~u', $simbol, $string);
    return  $str;
}