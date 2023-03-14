<?php

namespace app\services;

use app\models\News;
use Yii;

class SendEmails implements SendEmailsInterface
{

    public function send(News $news)
    {

        $textMail = 'Новость ' . $news->title . ' посмотрели ' . $news->counter . ' раз.';

        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['senderEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Рейтинг просмотра новости')
            ->setTextBody($textMail)
            ->send();


//        $message = Yii::$app->mailer->compose();
//
//        if (Yii::$app->user->isGuest) {
//            $message->setFrom('from@domain.com')
//        } else {
//            $message->setFrom(Yii::$app->user->identity->email)
//        }
//        $message->setTo(Yii::$app->params['adminEmail'])
//            ->setSubject('Тема сообщения')
//            ->setTextBody('Текст сообщения')
//            ->send();
    }
}