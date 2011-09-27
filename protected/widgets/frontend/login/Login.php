<?php

/**
 * Widget Login
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */
class Login extends CWidget
{
	private $_login;
	
	public function init()
	{
		parent::init ();
		$files = CFileHelper::findFiles(
			Yii::getPathOfAlias('application.widgets.frontend.login'),
			array(
				'exclude'=>array('Login.php'),
				'level'=>1
				)
		);
		
		foreach($files as $file)
		{
			$module = array_pop(explode('/', dirname($file)));
			$this->_login[$module] = basename($file,'.php');			
		}		
	}
	
	public function run()
	{
		foreach($this->_login as $module=>$widget)
		{
			$this->widget('application.widgets.frontend.login.'.$module.'.'.$widget);
		}
	}
}

