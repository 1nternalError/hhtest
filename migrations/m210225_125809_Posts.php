<?php

use yii\db\Migration;

/**
 * Class m210225_125809_Posts
 */
class m210225_125809_Posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Comments', [
            'id' => $this->integer(),
            'postId' => $this->integer(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'body' => $this->text()
        ]);

        $this->createTable('Posts', [
            'id' => $this->integer(),
            'userId' => $this->integer(),
            'title' => $this->string(255),
            'body' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Posts');
        $this->dropTable('Comments');
        return false;
    }

}
