<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserRoles extends ActiveRecord
{
    public int $id;
    public int $user_id;
    public int $role_id;

    public static function tableName(): string
    {
        return '{{%user_roles}}';
    }
}