<?php

/**
 * Facebook class file.
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class FBIdentity extends SEUserIdentity
{
	public function init()
	{
		Yii::app()->user->getEventHandlers('onAuthenticate')->add($this);
		Yii::app()->attachEventHandler('onAuthenticate', array($this, 'authenticate'));
	}
	
	/**
	 * User authentication on Facabook.
	 * @return string
	 */
    public function authenticate()
	{
		$this->_id = $this->password;
		return $this->errorCode==self::ERROR_NONE;
    }
}
