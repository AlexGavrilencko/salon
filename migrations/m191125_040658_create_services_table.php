<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m191125_040658_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),// название
            'data_time' => $this->date(),// время и дата
            'number_of_seats' => $this->integer(),// количество мест
            'praise' => $this->integer(),// цена
            'id_master' => $this->integer()// id мастера
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
