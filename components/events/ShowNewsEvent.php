<?php

namespace app\components\events;

use app\models\News;
use yii\base\Event;

class ShowNewsEvent extends Event
{
    public News $news;
}