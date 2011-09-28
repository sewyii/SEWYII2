<?php

class m110928_055849_insert_test_auth_data extends CDbMigration {
    public function up() {
        $auth=Yii::app()->authManager;

        $role=$auth->createRole('user');
        $role=$auth->createRole('resident');
        $role->addChild('user');
        $role=$auth->createRole('vip');
        $role->addChild('user');
        $role=$auth->createRole('admin');
        $role->addChild('user');
        $role->addChild('resident');
        $role->addChild('vip');



        Yii::app()->authManager->assign('admin', 1);
    }

    public function down() {
        $this->truncateTable('{{auth_item_child}}');
        $this->truncateTable('{{auth_item}}');
        $this->truncateTable('{{auth_assigment}}');
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