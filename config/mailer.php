<?php

use yii\symfonymailer\Mailer;

return [
    'class' => Mailer::class,
    'viewPath' => '@app/mail',
    'useFileTransport' => false,
    'transport' => [
        'dsn' => 'smtp://e.ryndya@worksolutions.ru:password@smtp.yandex.ru:465',
    ],
];