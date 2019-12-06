<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191125_040709_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),// имя
            'e_mail' => $this->string(),// почта
            'phone' => $this->string(),// телефон
            'password' => $this->string(),// пароль
            'rang' => $this->tinyInteger(),// ранг пользователя
            'fhoto' => $this->string()// фото пользователя
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
