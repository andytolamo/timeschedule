<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use  app\models\User;


class DefaultController extends Controller
{

    protected function getIdentity(){
       $id = Yii::$app->user->id;
       return  User::find()->where(['id'=>$id ])->one();
    }


}
