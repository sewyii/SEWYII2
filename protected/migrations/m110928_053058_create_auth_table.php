<?php

class m110928_053058_create_auth_table extends CDbMigration {
    public function up() {
        $this->createTable('{{auth_assignment}}', array(
                'itemname' => 'string',
                'userid' => 'integer',
                'bizrule' => 'text',
                'data' => 'text',
                ),"ENGINE=InnoDB DEFAULT CHARSET=utf8");

        Yii::app()->db->createCommand('ALTER TABLE {{auth_assignment}} ADD PRIMARY KEY ( `itemname` , `userid` ) ;')->execute();


        $this->createTable('{{auth_item}}', array(
                'name' => 'string',
                'type' => 'integer',
                'description' => 'text',
                'bizrule' => 'text',
                'data' => 'text',
                ),"ENGINE=InnoDB DEFAULT CHARSET=utf8");

        Yii::app()->db->createCommand('ALTER TABLE {{auth_item}} ADD PRIMARY KEY ( `name` , `type` ) ;')->execute();


        $this->createTable('{{auth_item_child}}', array(
                'parent' => 'string',
                'child' => 'string',

                ),"ENGINE=InnoDB DEFAULT CHARSET=utf8");

        Yii::app()->db->createCommand('ALTER TABLE {{auth_item_child}} ADD PRIMARY KEY ( `parent` , `child` ) ;')->execute();

    }


    public function down() {
        $this->dropTable('{{auth_assignment}}');
        $this->dropTable('{{auth_item}}');
        $this->dropTable('{{auth_item_child}}');
    }

    /*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
    */
}