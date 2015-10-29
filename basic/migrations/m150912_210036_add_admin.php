<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

class m150912_210036_add_admin extends Migration
{
    public function up()
    {

        $model = new User();
        $username = 'timemaster';
        $password =  'moonlanding';
        $password = $model->hashPassword($password);
        $authKey =  Yii::$app->getSecurity()->generateRandomString();
        $accessToken =  Yii::$app->getSecurity()->generateRandomString();



        $model->username = $username;
        $model->password = $password;
        $model->authKey = $authKey;
        $model->accessToken = $accessToken;

        var_dump($model->attributes);
        var_dump($model);

        if($model->validate()){
            $model->save();
            return true;
        }

        return false;

    }

    public function down()
    {
        echo "m150912_210036_add_admin cannot be reverted.\n";

        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
