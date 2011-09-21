<?php

class m110921_140516_create_user_table extends CDbMigration {
    public function up() {
        $sql="CREATE  TABLE IF NOT EXISTS `sewyii_user` (
                          `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                          `login` VARCHAR(30) NOT NULL ,
                          `password` VARCHAR(50) NOT NULL ,
                          `salt` VARCHAR(50) NOT NULL ,
                          `email` VARCHAR(50) NOT NULL ,
                          `date_register` DATETIME NOT NULL ,
                          `date_activate` DATETIME NULL DEFAULT NULL ,
                          `ip_register` VARCHAR(20) NOT NULL ,
                          `status` INT(10) UNSIGNED NOT NULL DEFAULT 0 ,
                          `activate_key` VARCHAR(32) NULL DEFAULT NULL ,
                          PRIMARY KEY (`id`) ,
                          UNIQUE INDEX `user_login` (`login` ASC) ,
                          UNIQUE INDEX `user_mail` (`email` ASC)
                        ENGINE = InnoDB
                        AUTO_INCREMENT = 1
                        DEFAULT CHARACTER SET = utf8";
        Yii::app()->db->createCommand($sql)->query();
    }

    public function down() {
        $sql="DROP TABLE {{user}}";
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