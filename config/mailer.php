<?php

use yii\symfonymailer\Mailer;

return [
    'class' => Mailer::class,
    'viewPath' => '@app/mail',
    'useFileTransport' => false,
    'transport' => [
        'dsn' => 'smtp://e.ryndya@worksolutions.ru:82bP38qt@smtp.yandex.ru:465',
    ],
];