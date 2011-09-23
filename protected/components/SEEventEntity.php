<?php

/**
 * SEEventEntity class file.
 * @author Treitjak A. <serov.sh@gmail.com> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SEEventEntity extends CApplicationComponent
{
	public function onAuthenticate($event)
	{
		$this->_handlerModules('onAuthenticate');
		$this->raiseEvent('onAuthenticate',$event);
	}
	
	public function onLogin($event)
	{
		$this->_handlerModules('onLogin');		
		$this->raiseEvent('onLogin',$event);
	}
	
	
	protected function _handlerModules($event)
	{
		foreach(Yii::app()->getModules() as $item=>$params)
		{		
			$module = Yii::app()->getModule($item);
			if(method_exists ($module, 'events'))
			{	
				$m_events = $module->events();				
				if(array_key_exists($event, $m_events))
					$this->_attach($event, $module, $m_events[$event]);			
			}
		}			
		unset($module, $m_events);
	}

	protected function _attach($event, $owner, $m_event)
	{
		$this->getEventHandlers($event)->add(array($owner, $m_event));
	}
}
