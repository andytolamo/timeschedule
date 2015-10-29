<?php

namespace app\models;
use yii\db\Schema;
use yii\db\ActiveRecord;
use yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{


    public $salt = "/asS&1!=lAööa.Sa2!";

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    public function rules(){
    return [
        [['username', 'password', 'authKey', 'accessToken'], 'safe'],
        [['username'],'string'],
        [['password'],'string'],
        [['accessToken'],'string'],
        [['authKey'],'string'],
        [['username', 'password', 'authKey', 'accessToken'], 'required']

    ];
}



    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::find()->where(['id'=>$id])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['accesToken'=>$token])->one();
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = new User();
        return $user->findBySql("SELECT * FROM user WHERE username =:username", array(':username'=>$username))->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @param  Use $user;
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password, $hash)
    {
        if(md5($this->salt.$password) === $hash){


            return true;
        }
        file_put_contents('/tmp/log', md5($this->salt.$password).' : '.$hash);
        return false;
    }

    /**
     * hashes password
     *
     * @param $password
     * @return string
     */
    public function hashPassword($password){
        return md5($this->salt.$password);
    }


}
