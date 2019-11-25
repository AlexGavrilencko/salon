<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_record}}`.
 */
class m191125_040638_create_user_record_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_record}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_record}}');
    }
}
