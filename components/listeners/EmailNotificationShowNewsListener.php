<?php

namespace app\components\listeners;

use app\components\events\ShowNewsEvent;
use app\jobs\SendEmailJob;
use app\services\SendEmails;
use app\services\SendEmailsInterface;
use Yii;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use yii\web\Cookie;

class EmailNotificationShowNewsListener
{
    /**
     * @throws NotInstantiableException
     * @throws InvalidConfigException
     */
    public static function handle(ShowNewsEvent $event): void
    {

        Yii::$app->response->cookies->add(new Cookie([
            'name' => 'counter_' . $event->news->id,
            'value' => true,
        ]));

        $event->news->counter++;


        if (($event->news->counter % 10) == 0) {
            Yii::$app->queue->push(new SendEmailJob($event->news));
        }

        $event->news->save();
    }
}