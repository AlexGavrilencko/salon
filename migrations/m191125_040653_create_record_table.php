<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%record}}`.
 */
class m191125_040653_create_record_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%record}}', [
            'id' => $this->primaryKey(),
            'id_master' => $this->integer(),// id мастера
            'dataz' => $this->date(),// дата
            'timez' => $this->date(),// время
            'id_services' => $this->integer(),// id услуги
            'id_user' => $this->integer(),// id пользователя
            'id_status' => $this->integer()// id статуса
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%record}}');
    }
}
