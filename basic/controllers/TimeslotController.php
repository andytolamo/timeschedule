<?php

namespace app\controllers;

use Yii;
use app\controllers\DefaultController;
use yii\data\ActiveDataProvider;
use app\models\Timeslot;

class TimeslotController extends DefaultController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        //show list of timeslots for the logged user
        $user = $this->getIdentity();
        $dataProvider = new ActiveDataProvider([
            'query' => Timeslot::find()->where(['uid' => $user->id]),
        ]);



        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {


    }


    public function actionUpdate()
    {


    }


}
