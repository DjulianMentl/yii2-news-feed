<?php

namespace app\jobs;

use app\models\News;
use Yii;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class SendEmailJob extends BaseObject implements JobInterface
{
    private News $news;

    public function __construct(News $news, $config = [])
    {
        parent::__construct($config);
        $this->news = $news;
    }

    /**
     * @inheritDoc
     */
    public function execute($queue)
    {
        $textMail = 'Новость ' . $this->news->title . ' посмотрели ' . $this->news->counter . ' раз.';

        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['senderEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Рейтинг просмотра новости')
            ->setTextBody($textMail)
            ->send();
    }
}