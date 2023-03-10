<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_roles}}`.
 */
class m230310_065039_create_user_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_roles}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'role_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultValue(new Expression('NOW()')),
        ]);

        $this->insert('{{%user_roles}}', [
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user_roles}}', ['id' => 1]);
        $this->dropTable('{{%user_roles}}');
    }
}
