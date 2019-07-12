<?php

$menu4 = [
    [
        'title' => 'Главная',
        'link' => '/'
    ],
    [
        'title' => 'Контакты',
        'link' => '/contancts'
    ],
    [
        'title' => 'Статьи',
        'link' => '/articles',
        'children' => [
            [
                'title' => 'Котики',
                'link' => '/articles/cats'
            ],
            [
                'title' => 'Собачки',
                'link' => '/articles/dogs',
                'children' => [
                    [
                        'title' => 'Доберманы',
                        'link' => '/articles/dogs/dobermani'
                    ],
                    [
                        'title' => 'Корги',
                        'link' => '/articles/dogs/corgi',
                        'children' => [/* */]
                    ]
                ]
            ]
        ]
    ]
];


function menu($array){
     echo "<ul>\r\n";
     foreach ($array as $menu){
     echo "<li>\r\n";
     echo '<a href="'.$menu['link'].'" class="on-default fa remove" data-form-id="">'.$menu['title'].'</a>';
         if(!empty($menu['children'])){
             menu($menu['children']);
         }
     echo "\r\n</li>\r\n";
    }
    echo "</ul>\r\n";
}

menu($menu4);