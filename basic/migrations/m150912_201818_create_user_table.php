<?php

use yii\db\Schema;
use yii\db\Migration;

class m150912_201818_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', array(
            'id' => 'pk AUTO_INCREMENT ',
            'username' => 'varchar (60) NOT NULL UNIQUE',
            'password' => 'varchar (150) NOT NULL',
            'authKey' => 'varchar (90) NOT NULL UNIQUE',
            'accessToken'=> 'varchar (90) NOT NULL UNIQUE',


        ));

    }

    public function down()
    {
        $this->dropTable('user');

        return true;;
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
