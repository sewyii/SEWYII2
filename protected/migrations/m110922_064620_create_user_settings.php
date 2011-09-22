<?php

class m110922_064620_create_user_settings extends CDbMigration {
    public function up() {
        $sql="CREATE  TABLE IF NOT EXISTS {{user_settings}} (
                      `id` INT NULL AUTO_INCREMENT ,
                      `send_email` INT NULL ,
                      `view_email` INT NULL ,
                      PRIMARY KEY (`id`) )
                    ENGINE = InnoDB
                    DEFAULT CHARACTER SET = utf8
                    COLLATE = utf8_general_ci";
        Yii::app()->db->createCommand($sql)->query();
    }
    
    public function down() {
        $sql="DROP TABLE {{user_settings}}";
        Yii::app()->db->createCommand($sql)->query();
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