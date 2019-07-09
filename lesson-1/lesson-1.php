<?php
$a = 5;
$b = '05';
var_dump($a == $b);                             //Динамическая типизация приведет к числу и проверит значения
var_dump((int)'0000012345');                        // При приобразовании строки в int ведущие нули будут удалены, поскольку они не имеют значения в числовых значениях
var_dump((float)123.0 === (int)123.0); //Потому что идет жесткое сравнение не только по значению а также и по типу данных.
var_dump((int)0 === (int)'hello, world'); //Строчка которая начинается не с числа а с буквы преобразуется в 0 а так как у нас тут сравнение по значению и типу данных мы и получим true
?>


<?php
$title = 'Заголовок';
$h1 = 'Сейчас год:';
$thisYear = date('Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $h1 ?></h1>
<p><?= $thisYear ?> г.</p>
</body>
</html>


<?php
$a = 1;
$b = 2;

//php >= 5.6
//list($a, $b) = array($b, $a);

//php 7.1
[$a, $b] = [$b, $a];

var_dump($a);
var_dump($b);
?>