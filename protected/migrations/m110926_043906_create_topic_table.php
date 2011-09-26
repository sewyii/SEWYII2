<?php

class m110926_043906_create_topic_table extends CDbMigration {
    public function up() {
        $this->createTable('{{topic}}', array(
                'id' => 'pk',
                'id_blog' => 'integer',
                'id_user' => 'integer',
                'type' => 'integer',
                'title' => 'string',
                'tags' => 'string',
                'tmplate'=>'integer',
                'publish'=>'integer',
                'create_date' => 'datetime',
                'edit_date' => 'datetime',
                'text' => 'text',
                'short' => 'text',
                'source' => 'text',
                'hash' => 'string',
                ),"ENGINE=InnoDB DEFAULT CHARSET=utf8");

    }

    public function down() {
        $this->dropTable('{{topic}}');
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