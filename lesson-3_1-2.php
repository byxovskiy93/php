<?php


function firstTask(){
    $i = 0;

    while($i <= 100){
        if(is_int($i/3)) echo "$i <br>\r\n";
        $i++;
    }
}

function secondTask(){
    $j = 0;

    do {
        if($j == 0) echo "$j – ноль.<br>\r\n";
        else echo (is_int($j/2)) ? "$j – четное число. <br>\r\n" : "$j – нечетное число. <br>\r\n";
        $j++;
    }while ($j <= 10);

}

//firstTask();
secondTask();