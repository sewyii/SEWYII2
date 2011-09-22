<?php

class m110922_134559_create_user_session extends CDbMigration {
    public function up() {

        $this->createTable('{{user_session}}', array(
                'ssesion_key' => 'string',
                'id_user' => 'integer',
                'ip_create' => 'string',
                'ip_last' => 'string',
                'create_date' => 'datetime',
                'last_date' => 'datetime',
        ),"ENGINE=InnoDB DEFAULT CHARSET=utf8");
    }

    public function down() {
        $this->dropTable('{{user_session}}');
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