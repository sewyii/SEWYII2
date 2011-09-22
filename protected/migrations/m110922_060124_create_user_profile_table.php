<?php

class m110922_060124_create_user_profile_table extends CDbMigration {
    public function up() {
        $sql="CREATE  TABLE IF NOT EXISTS {{user_profile}} (
                  `id_user` INT(11) UNSIGNED NOT NULL ,
                  `name` VARCHAR(50) NOT NULL ,
                  `sex` VARCHAR(8) NOT NULL ,
                  `birthday` DATETIME NOT NULL ,
                  `about` TEXT NOT NULL ,
                  `site` VARCHAR(50) NOT NULL ,
                  `icq` BIGINT(10) NOT NULL ,
                  `avatar` VARCHAR(200) NOT NULL ,
                  PRIMARY KEY (`id_user`) )
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8";
              Yii::app()->db->createCommand($sql)->query();
    }

    public function down() {
        $sql="DROP TABLE {{user_profile}}";
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