<?php

use Faker\Factory;
use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m230309_063958_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
            'preview' => $this->string(1000)->notNull(),
            'text' => $this->string(2000)->notNull(),
            'date' => $this->timestamp()->defaultValue(new Expression('NOW()')),
            'counter' => $this->integer()->defaultValue(0),
            'image' => $this->string(200),
            'created_at' => $this->timestamp()->defaultValue(new Expression('NOW()')),
            'updated_at' => $this->timestamp(),
        ]);

        $this->actionGenerate();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%news}}');
        $this->dropTable('{{%news}}');
    }


    public function actionGenerate()
    {
        $faker = Factory::create('ru_RU');

        for ($i = 1; $i <= 20; $i++) {

            $img = 'img' . '.gif';

            $news[] = [
                $faker->realText(40),
                $faker->realText(500),
                $faker->realText(2000),
                0,
                $img,
            ];
        }

        $this->batchInsert('{{%news}}', ['title', 'preview', 'text', 'counter', 'image'], $news);
        unset($news);
    }
}
