<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230310_065930_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull(),
            'email' => $this->string(80)->notNull(),
            'password' => $this->string(80)->notNull(),
            'authKey' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp()->defaultValue(new Expression('NOW()')),
            'updated_at' => $this->timestamp(),
        ]);

        $this->insert('{{%users}}', [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('qwer1'),
            'authKey' => Yii::$app->security->generateRandomString(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%users}}', ['id' => 1]);
        $this->dropTable('{{%users}}');
    }
}
