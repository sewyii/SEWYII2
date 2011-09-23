<?php

/**
 * SExpansion of functional CFromModel.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SEFormModel extends CFormModel
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