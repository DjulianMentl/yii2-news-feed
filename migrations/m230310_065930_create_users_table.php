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
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50)->notNull(),
            'email' => $this->string(80)->notNull(),
            'password' => $this->string(20)->notNull(),
            'created_at' => $this->timestamp()->defaultValue(new Expression('NOW()')),
            'updated_at' => $this->timestamp(),
        ]);

        $this->insert('{{%users}}', [
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'qwer1',
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
