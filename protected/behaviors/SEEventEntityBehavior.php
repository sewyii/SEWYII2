<?php

/**
 * SEEventEntityBehavior is ...
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SEEventEntityBehavior extends CBehavior
{	
	public function onAuthenticate($event)
	{
		$this->raiseEvent('onAuthenticate',$event);
	}
}