<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Role model
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 */
class Role extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%roles}}';
    }
}