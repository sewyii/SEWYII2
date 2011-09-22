<?php

/**
 * SEInitBackend class file.
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SEInitBackend extends SEInitEntity
{
	/**
	 * Return the type of the current application.
	 * @return string 
	 */
	public function getName()
	{
		return Yii::t('sewyii','Backend application');
	}
	
	/**
	 * Determine the basis of aliases.
	 * @param CEvent $event 
	 */
	protected function _initSystem($event)
	{
		parent::_initSystem ($event);		
		Yii::setPathOfAlias('actions',Yii::getPathOfAlias('application.actions.backend'));		
		Yii::setPathOfAlias('widgets',Yii::getPathOfAlias('application.widgets.backend'));
		$this->_preImport();
	}
	
	/**
	 * Preliminary import elements of the system.
	 */
	protected function _preImport()
	{
		parent::_preImport();
	}
}
