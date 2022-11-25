<?php
return [

    /*
    | Пути до файлов обмена 1с и кабель арсенал и параметры
    */

    '1с' => [
        'file' => public_path('/exchange/elCabel.xml'),
        'price_ratio'=>'0.9'
    ],
    'kablars' => [
        'file'=>'https://www.kabelarsenal.ru/price.xlsx',
        'ranges'=>['A5:C132','F5:H101','K5:M106','P5:R101'],
        'price_ratio' =>'1.3'
        ],

];
