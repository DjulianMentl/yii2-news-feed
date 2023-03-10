<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User1 extends ActiveRecord implements IdentityInterface
{
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    private mixed $auth_key;

    public static function tableName(): string
    {
        return '{{%users}}';
    }

    /**
     * @inheritDoc
     */
    public static function findIdentity($id): User1|IdentityInterface|null
    {
        return static::findOne($id);
    }

    /**
     * @inheritDoc
     */
    public static function findIdentityByAccessToken($token, $type = null): User1|IdentityInterface|null
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritDoc
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritDoc
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->getAuthKey() === $authKey;
    }


    public function findByUsername($username): bool
    {
        return $this->username === $username;
    }

    public function validatePassword($password): bool
    {
        return $this->password === $password;
    }
}