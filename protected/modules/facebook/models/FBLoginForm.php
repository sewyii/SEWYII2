<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. 
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */
class FBLoginForm extends SEFormModel
{
	public $session;
	public $rememberMe;	     

	private $_identity;		
	
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new FBUserIdentity($this->session);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}
	
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new FBUserIdentity($this->session);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===FBUserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);			
			Yii::app()->user->setState('logout',$this->session->getLogoutUrl(array(
				'next'=>Yii::app()->getBaseUrl(true)
			)));
			return true;
		}
		else
			return false;		
	}
}
