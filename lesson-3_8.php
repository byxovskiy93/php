<?php
$region = [
    'Московская область' => ['Москва','Абрамцево','Алабино','Апрелевка','Архангельское'],
    'Ленинградская область' => ['Санкт-Петербург','Александровская',
    'Бокситогорск','Большая Ижора','Будогощь'],
    'Рязанская область' => ['Рязань','Горняк','Гусь Железный','Елатьма','Ермишь'],
    'Воронежская область' => ['Воронеж','Воробьевка','Верхняя Хава','Бутурлиновка','Калач']
];

foreach ($region as $k => $v){
    echo "\r\n<br>$k:<br>\r\n";
        foreach ($v as $j => $city){
            if(mb_substr($city, 0, 1) == 'К'){
                echo ($j !== count($v)-1) ? "$city, " : "$city";
            }
        }
}