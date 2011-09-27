<?php

/**
 * LightOpenIdEntity class file.
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

require dirname(__FILE__).'/../vendor/LightOpenID.php';

class LightOpenIdEntity extends LightOpenID
{
	static public $instance;
	
	public function __construct($config=array())
	{	
		parent::__construct();
		
		$module= Yii::app()->getModule('loid');
		
		$config = CMap::mergeArray(
			$config,
			array(
				'identity'=>$module->identity,
				'required'=>$module->required,
				'returnUrl'=>$module->callback
			)
		);
		
		if(!empty($config))
		{
			foreach($config as $key=>$value)
			{
				$this->{$key} = $value;
			}
		}
	}
	
	static public function getEntity($config=array())
	{
		if(is_null(self::$instance))
			self::$instance = new LightOpenIdEntity($config);
		
		return self::$instance;
	}
}
