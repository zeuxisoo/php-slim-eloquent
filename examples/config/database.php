<?php
return [
    'databases' => [
        'default' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'opinz',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => ''
        ],
        'testing' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'test',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => ''
        ]
    ]
];
