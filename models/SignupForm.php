<?php


namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $name;
    public $e_mail;
    public $phone;
    public $password;
    public $password_repeat;
  


    public function rules()
    {
        return [
            [['e_mail', 'password','password_repeat','name','phone'], 'required'],
            [['password'],'string', 'min' => 8, 'max' => 32], //длинна от 8 до 32 символов
            [['e_mail'], 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'e_mail'], //имя(логин) уникально
            ['e_mail', 'email'], //емэил это емэил
            ['password', 'compare'], //два пароля совпадают
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'e_mail' => 'Электронная почта',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }

    public function signup()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }
}