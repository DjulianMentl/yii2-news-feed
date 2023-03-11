<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * UserRoles model
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 */
class UserRoles extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%user_roles}}';
    }
}