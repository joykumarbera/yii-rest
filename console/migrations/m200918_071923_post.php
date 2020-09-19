<?php

use yii\db\Migration;

/**
 * Class m200918_071923_post
 */
class m200918_071923_post extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('post',[
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'title' => $this->string(255)->notNull()->unique(),
            'content' => $this->text(),
            'published_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => "ENUM('draft','published')",
            'image' => $this->string(255)
        ]); 

        $this->addForeignKey(
            'fk_post_author_id',
            'post',
            'author_id',
            'user',
            'id',
            'CASCADE',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_post_author_id');
        $this->dropTable('post');
    }
}
