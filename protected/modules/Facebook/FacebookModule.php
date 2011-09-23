<?php
/**
 * FacebookModule 
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class FacebookModule extends SEModule
{
	public $appId;
	public $secret;
	public $cookie;
	
	public function init()
	{
		parent::init();

		// import the module-level models and components
		$this->setImport(array(
			'Facebook.models.*',
			'Facebook.components.*',
		));
		
			
	}
}