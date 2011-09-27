<?php

Yii::import('application.modules.twitter.components.TwitterEntity');

class TwitterLogin extends CInputWidget{
      
    private $TW;

    public function run()
	{
        
			if(Yii::app()->user->isGuest)
			{
				$module=Yii::app()->getModule('twitter');
                $this->TW = TwitterEntity::getEntity();			
			}
                        
            if(Yii::app()->user->isGuest)
			{  				
				$request_token = $this->TW->getRequestToken();

				$token = $request_token['oauth_token'];
				Yii::app()->user->setState('oauth_token', $token);
				Yii::app()->user->setState('oauth_token_secret', $request_token['oauth_token_secret']);                                              
                
				if($this->TW->http_code == 200)
				{	
					$this->render('login',array('loginUrl'=>$this->TW->getAuthorizeURL($request_token))); 
				}				  
			}			
      }
              
}