<?php

class m110922_061105_add_date_to_user_profile extends CDbMigration
{
	public function up()
	{
            $sql="
            ALTER TABLE {{user_profile}} ADD `update_date` TIMESTAMP NOT NULL;
            ALTER TABLE {{user_profile}} ADD `create_date` DATETIME NOT NULL;
            ";

	}

	public function down()
	{
		echo "m110922_061105_add_date_to_user_profile does not support migration down.\n";
		return false;
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