<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $e_mail
 * @property string|null $phone
 * @property string|null $password
 * @property int|null $rang
 * @property string|null $fhoto
 *
 * @property Record[] $records
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rang'], 'integer'],
            [['name', 'e_mail', 'phone', 'password', 'fhoto'], 'string', 'max' => 255],
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
            'e_mail' => 'E Mail',
            'phone' => 'Phone',
            'password' => 'Password',
            'rang' => 'Rang',
            'fhoto' => 'Fhoto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['id_user' => 'id']);
    }

    public function create()
    {
        return $this->save(false);
    }

    public static function findByEmail($e_mail)
    {
        return User::find()->where(['e_mail'=>$e_mail])->one();
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function findModel($id)
    {
        if (($model = user::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function saveImage($filename)
    {
        $this->fhoto = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->fhoto) ? '/uploads/' . $this->fhoto : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->fhoto);
    }
}
