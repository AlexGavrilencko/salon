<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%master}}`.
 */
class m191125_040704_create_master_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%master}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%master}}');
    }
}
