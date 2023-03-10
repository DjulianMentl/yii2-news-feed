<?php

use app\Models\Role;
use Faker\Factory;
use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%roles}}`.
 */
class m230309_101738_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%roles}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'code' => $this->string(30)->notNull()->unique(),
            'created_at' => $this->timestamp()->defaultValue(new Expression('NOW()')),
            'updated_at' => $this->timestamp(),
        ]);

        $this->insert('{{%roles}}', [
            'name' => 'Administrator',
            'code' => 'ADMIN',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%roles}}', ['id' => 1]);
        $this->dropTable('{{%roles}}');
    }
}
