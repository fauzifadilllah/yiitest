<?php

namespace app\models;

use Yii;


class newUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
   

   
    public static function tableName()
    {
        return 'user';
    }

    public static function rules()
{
    return [
        [['username', 'email', 'password'], 'filter', 'filter' => 'trim'],
        [['username', 'email', 'status'], 'required'],
       
        ['username', 'string', 'min' => 2, 'max' => 255],
        ['password', 'required', 'on' => 'create'],
        ['username', 'unique', 'message' => 'Это имя занято.'],
        
    ];
}

    public static function attributeLabels()
    {
        return[
            'username'=>'username',
            'password'=>'password'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['accessToken'=>$token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public static function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public static function validatePassword($password)
    {
        return password_verify($password,$this->password);
    }
}
