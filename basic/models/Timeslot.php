<?php

namespace app\models;
use yii\db\Schema;
use yii\db\ActiveRecord;
use yii;

class Timeslot extends ActiveRecord
{




    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timeslot';
    }


    public function rules(){
    return [
        [['start_date'],'date', 'format'=>'Y-m-d'],
        [['end_date'],'date', 'format'=>'Y-m-d'],
        [['end_time'],'date', 'format'=>'h:m:s'],
        [['start_time'],'date', 'format'=>'h:m:s'],
        [['id'],'integer'],
        [['uid'],'integer'],
        [['start_time', 'end_time', 'start_date', 'end_date', 'description', 'uid'], 'safe'],
        [['start_date', 'uid'], 'required'],
    ];
}



    /**
     * @inheritdoc
     */
    public static function findByUserDate($uid, $date)
    {
        return self::find()->where(['uid'=>$uid, 'start_date'=>$date])->one();
    }




}
