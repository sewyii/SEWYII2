<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */
class FBUserIdentity extends CUserIdentity
{
	private $_session;
	private $_id;
	private $_name;

	public function __construct(FacebookEntity $session=NULL)
	{
		$this->_id		= $userid;
		$this->_name	= $username;
		$this->_session = $session;
	}
	
	public function authenticate()
	{	
		if(is_null($this->_session->getSession()))
		{	
			$this->errorCode=self::ERROR_USERNAME_INVALID;		
		}
		else
		{
			$user = $this->_session->api('/me');
			$this->_id = $user['id'];
			$this->_name = $user['name'];
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
}