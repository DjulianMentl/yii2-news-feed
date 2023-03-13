<?php

return [
    '/' => 'site/index',
    'about' => 'site/about',
    'contact' => 'site/contact',
    'login' => 'site/login',
    'logout' => 'site/logout',
    'news' => 'news/index',
    'news/<id:\d+>' => 'news/show',
    [
        'class' => 'yii\web\GroupUrlRule',
        'prefix' => 'admin',
        'rules' => [
            'news'                    => 'news/index',
            'DELETE news/<id:\d+>'    => 'news/destroy',
            'PUT,PATCH news/<id:\d+>' => 'news/update',
            'news/<id:\d+>'           => 'news/show',
            'news/<id:\d+>/edit'      => 'news/edit',
            'news/create'             => 'news/create',
            'POST news/store'         => 'news/store',
        ],
    ]
];