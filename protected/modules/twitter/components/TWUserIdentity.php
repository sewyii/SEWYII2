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
class TWUserIdentity extends SEUserIdentity
{
	private $_session;
	private $_id;
	private $_name;
    private $_access_token;

	public function __construct(TwitterEntity $session=NULL)
	{
		$this->_session = $session;	
		$this->_access_token = $this->_session->getAccessToken(Yii::app()->request->getString('oauth_verifier'));
	}
	
	public function authenticate()
	{
		if(is_null($this->_access_token))
        {        
			$this->errorCode=self::ERROR_USERNAME_INVALID;		
        } 
		else 
		{
			Yii::app()->user->setState('access_token', $this->_access_token);
			Yii::app()->user->setState('oauth_token', NULL);
			Yii::app()->user->setState('oauth_token_secret', NULL);                                              
            $user_info = $this->_session->get('account/verify_credentials');
            $this->_id = $user_info->id;
            $this->_name = $user_info->name;			
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