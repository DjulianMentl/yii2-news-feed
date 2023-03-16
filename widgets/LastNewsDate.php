<?php

namespace app\widgets;

use app\models\News;
use ExceptionMessages;
use yii\bootstrap5\Widget;


class LastNewsDate extends Widget
{
    public function run(): string
    {
        $lastDate = News::find()->select('date')->orderBy(['date' => SORT_DESC])->scalar();

        return "Дата последней новости: " . $lastDate;
    }
}
