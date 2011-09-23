<?php

/**
 * Facebook class file.
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class FBFrontendController extends SEUserIdentity
{	
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
