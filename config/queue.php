<?php

use yii\mutex\PgsqlMutex;
use yii\queue\db\Queue;
use yii\queue\LogBehavior;

return [
    'class' => Queue::class,
    'as log' => LogBehavior::class,
    'db' => 'db',
    'tableName' => '{{%queue}}',
    'channel' => 'default',
    'mutex' => [
        'class' => PgsqlMutex::class,
        'db' => 'db',
    ],
    'mutexTimeout' => 0,
];