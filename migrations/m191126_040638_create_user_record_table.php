<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_record}}`.
 */
class m191126_040638_create_user_record_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Связи для таблицы Запись на услуги
        // creates index for column `id_master` or record
        $this->createIndex(
            'idx-record-id_master',
            'record',
            'id_master'
        );
        // add foreign key for table `master`
        $this->addForeignKey(
            'fk-record-id_master',
            'record',
            'id_master',
            'master',
            'id',
            'CASCADE'
        );


        //Связи для таблицы Запись на услуги
        // creates index for column `id_services` or record
        $this->createIndex(
            'idx-record-id_services',
            'record',
            'id_services'
        );
        // add foreign key for table `master`
        $this->addForeignKey(
            'fk-record-id_services',
            'record',
            'id_services',
            'services',
            'id',
            'CASCADE'
        );


        //Связи для таблицы Запись на услуги
        // creates index for column `id_user` or record
        $this->createIndex(
            'idx-record-id_user',
            'record',
            'id_user'
        );
        // add foreign key for table `master`
        $this->addForeignKey(
            'fk-record-id_user',
            'record',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        


        //Связи для таблицы Запись на услуги
        // creates index for column `id_status` or record
        $this->createIndex(
            'idx-record-id_status',
            'record',
            'id_status'
        );
        // add foreign key for table `master`
        $this->addForeignKey(
            'fk-record-id_status',
            'record',
            'id_status',
            'status',
            'id',
            'CASCADE'
        );


        //Связи для таблицы Услуги
        // creates index for column `id_master` or services
        $this->createIndex(
            'idx-services-id_master',
            'services',
            'id_master'
        );
        // add foreign key for table `master`
        $this->addForeignKey(
            'fk-services-id_master',
            'services',
            'id_master',
            'master',
            'id',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Запись на услуги
        // drops foreign key for table `record`
        $this->dropForeignKey(
            'fk-record-id_master',
            'record'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-record-id_master',
            'record'
        );

        // Запись на услуги
        // drops foreign key for table `record`
        $this->dropForeignKey(
            'fk-record-id_services',
            'record'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-record-id_services',
            'record'
        );


        // Запись на услуги
        // drops foreign key for table `record`
        $this->dropForeignKey(
            'fk-record-id_user',
            'record'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-record-id_user',
            'record'
        );


        // Запись на услуги
        // drops foreign key for table `record`
        $this->dropForeignKey(
            'fk-record-id_status',
            'record'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-record-id_status',
            'record'
        );


        // Услуги
        // drops foreign key for table `services`
        $this->dropForeignKey(
            'fk-services-id_master',
            'services'
        );
        // drops index for column `city_id`
        $this->dropIndex(
            'idx-services-id_master',
            'services'
        );
    }
}
