<?php
/**
 * LoidModule 
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class LoidModule extends SEModuleEntity
{
	public $identity;
	public $callback;
	public $required;
	
	public function init()
	{
		parent::init();

		// import the module-level models and components
		$this->setImport(array(
			'loid.models.*',
			'loid.components.*',
			'loid.vendor.*',
		));
	}
}