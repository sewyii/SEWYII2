<?php

class m110923_070219_create_page_table extends CDbMigration {
    public function up() {

        $this->createTable('{{page}}', array(
                'id' => 'pk',
                'name' => 'integer',
                'title' => 'string',
                'content' => 'text',
                'parent'=>'integer',
                'tmplate'=>'integer',
                'status'=>'integer',
                'create_date' => 'datetime',
                ),"ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    public function down() {
        $this->dropTable('{{page}}');
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