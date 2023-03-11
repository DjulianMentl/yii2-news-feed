<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $authKey
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName(): string
    {
        return '{{%users}}';
    }

    public static function findIdentity($id): User|IdentityInterface|null
    {
        return static::findOne($id);
    }

    public static function findByUsername($username): array|ActiveRecord
    {
        return static::find()
            ->where(['username' => $username])
            ->one();
    }

    public function validatePassword($password): bool
    {
        return  Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @inheritDoc
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null): User|IdentityInterface|null
    {
//        return static::findOne(['access_token' => $token]);
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId(): int|string
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey): ?bool
    {
        return $this->getAuthKey() === $authKey;
    }
}