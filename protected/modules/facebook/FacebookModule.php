<?php
/**
 * FacebookModule  
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */

class FacebookModule extends SEModuleEntity
{
	public $devappid;
    public $devsecret;
    public $cookie;
	
	public function init()
	{
		parent::init();

		// import the module-level models and components
		$this->setImport(array(
			'facebook.models.*',
			'facebook.components.*',
			'facebook.vendor.*',
		));		
	}
}