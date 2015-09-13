<?php

use yii\db\Schema;
use yii\db\Migration;

class m150913_165856_create_timeslot_table extends Migration
{
    public function up()
    {
        $this->createTable('timeslot', array(
            'id' => 'pk AUTO_INCREMENT ',
            'uid' => 'int NOT NULL',
            'start_date' => 'date NOT NULL',
            'end_date' => 'date',
            'start_time' => 'time',
            'end_time' => 'time',
            'description' => 'varchar(120)',

        ));

    }

    public function down()
    {

        $this->dropTable('timeslot');

        return false;
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
