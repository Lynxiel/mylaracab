<?php

return
[
    [
    'route' => 'index',
    'updated_at' => date( 'Y-m-d',filemtime(public_path('/exchange/elCabel.xml'))),    // last exchange time
    'freq' => 'daily',
    'priority' => 0.8,
    ], [
    'route' => 'delivery',
    'updated_at' => date( 'Y-m-d',filemtime(resource_path().'/views/delivery.blade.php')),
    'freq' => 'monthly',
    'priority' => 0.4,
],[
    'route' => 'about_us',
    'updated_at' => date( 'Y-m-d', filemtime(resource_path().'/views/about_us.blade.php')),
    'freq' => 'monthly',
    'priority' => 0.4,
]
    ,[
    'route' => 'agreement',
    'updated_at' => date( 'Y-m-d',filemtime(resource_path().'/views/agreement.blade.php')),
    'freq' => 'yearly',
    'priority' => 0.2,
]
    ,[
    'route' => 'politics',
    'updated_at' => date( 'Y-m-d',filemtime(resource_path().'/views/politics.blade.php')),
    'freq' => 'yearly',
    'priority' => 0.2,
]
];
