<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "record".
 *
 * @property int $id
 * @property int|null $id_master
 * @property string|null $dataz
 * @property string|null $timez
 * @property int|null $id_services
 * @property int|null $id_user
 * @property int|null $id_status
 *
 * @property Status $status
 * @property Master $master
 * @property Services $services
 * @property User $user
 */
class Record extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_master', 'id_services', 'id_user', 'id_status'], 'integer'],
            [['dataz', 'timez'], 'safe'],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['id_status' => 'id']],
            [['id_master'], 'exist', 'skipOnError' => true, 'targetClass' => Master::className(), 'targetAttribute' => ['id_master' => 'id']],
            [['id_services'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['id_services' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_master' => 'Id Master',
            'dataz' => 'Dataz',
            'timez' => 'Timez',
            'id_services' => 'Id Services',
            'id_user' => 'Id User',
            'id_status' => 'Id Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'id_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Master::className(), ['id' => 'id_master']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::className(), ['id' => 'id_services']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
