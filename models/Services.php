<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $data_time
 * @property int|null $number_of_seats
 * @property int|null $praise
 * @property int|null $id_master
 *
 * @property Record[] $records
 * @property Master $master
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_time'], 'safe'],
            [['number_of_seats', 'praise', 'id_master'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_master'], 'exist', 'skipOnError' => true, 'targetClass' => Master::className(), 'targetAttribute' => ['id_master' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'data_time' => 'Data Time',
            'number_of_seats' => 'Number Of Seats',
            'praise' => 'Praise',
            'id_master' => 'Id Master',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['id_services' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Master::className(), ['id' => 'id_master']);
    }
}
