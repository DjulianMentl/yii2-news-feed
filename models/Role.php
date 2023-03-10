<?php

namespace app\models;

use yii\db\ActiveRecord;

class Role extends ActiveRecord
{
    public int $id;
    public string $name;
    public string $code;

    public static function tableName(): string
    {
        return '{{%roles}}';
    }
}