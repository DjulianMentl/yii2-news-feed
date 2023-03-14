<?php

namespace app\components\events;

use app\models\News;
use yii\base\Event;

class ShowNewsEvent extends Event
{
    public News $news;

    public function __construct(News $news ,$config = [])
    {
        parent::__construct($config);

        $this->news = $news;
    }
}