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
        [['end_time'],'date', 'format'=>'yyyy-mm-dd HH:mm:ss'],
        [['start_time'],'date', 'format'=>'yyyy-mm-dd HH:mm:ss'],
        [['id'],'integer'],
        [['uid'],'integer'],
        [['start_time', 'end_time',  'description', 'uid'], 'safe'],
        [['start_time', 'uid'], 'required'],
    ];
}


    /**
     * Returns the attribute labels.
     *
     * See Model class for more details
     *
     * @return array attribute labels (name => label).
     */
    public function attributeLabels()
    {
        return [
            'end_time' => 'Loppuu',
            'start_time' => 'Alkaa',
            'description' => 'Selite',
            'id' => 'id'
        ];
    }


    /**
     * @inheritdoc
     */
    public static function findByUserDate($uid, $date)
    {
        return self::find()->where(['uid'=>$uid, 'start_date'=>$date])->one();
    }

    /**
     * @inheritdoc
     */
    public static function findByIdUid($id, $uid)
    {
        return self::find()->where(['id'=>$id, 'uid'=>$uid])->one();
    }




}
