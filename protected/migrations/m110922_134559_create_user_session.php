<?php

class m110922_134559_create_user_session extends CDbMigration
{
	public function up()
	{
            "CREATE  TABLE IF NOT EXISTS `mydb`.`sewyii_user_session` (
  `session_key` VARCHAR(32) NOT NULL ,
  `id_user` INT(11) UNSIGNED NOT NULL ,
  `ip_create` VARCHAR(15) NOT NULL ,
  `ip_last` VARCHAR(15) NOT NULL ,
  `date_create` DATETIME NOT NULL ,
  `date_last` DATETIME NOT NULL ,
  PRIMARY KEY (`session_key`) ,
  UNIQUE INDEX `user_id` (`id_user` ASC) ,
  INDEX `session_date_last` (`date_last` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8";

            $this->createTable('{{user_session}}', array(
            'id' => 'id',
            'name' => 'string NOT NULL',
            'email' => 'text',
        ));
	}

	public function down()
	{
		echo "m110922_134559_create_user_session does not support migration down.\n";
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