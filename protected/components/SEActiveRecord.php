<?php

/**
 * SExpansion of functional CActiveRecord.
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SEActiveRecord extends CActiveRecord
{
	/**
	 * Return the type of the current model.
	 * @return string 
	 */
	public function getName()
	{
		return get_class($this);
	}
}