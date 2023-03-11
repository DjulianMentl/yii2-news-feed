<?php

namespace app\models;

use DateTime;
use yii\db\ActiveRecord;

/**
 * News model
 *
 * @property integer $id
 * @property string $title
 * @property string $preview
 * @property string $text
 * @property DateTime $date
 * @property integer $counter
 * @property string $image
 */
class News extends ActiveRecord
{

}