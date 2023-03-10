<?php

namespace app\models;

use DateTime;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public int $id;
    public string $title;
    public string $preview;
    public string $text;
    public DateTime $date;
    public int $counter;
    public string $image;
}