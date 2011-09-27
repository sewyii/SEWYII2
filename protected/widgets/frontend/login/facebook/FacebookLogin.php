<?php

Yii::import('application.modules.facebook.components.FacebookEntity');

class FacebookLogin extends CInputWidget{
                
        public $FB;
        public $session;
        public $user;

        public function run(){
        
			if(Yii::app()->user->isGuest)
			{
				$this->FB = FacebookEntity::getEntity();

				$this->session =  $this->FB->getSession();
				$appids = $this->FB->getAppId();  
				if($this->session) {
					try {
						$uid = $this->FB->getUser();
						$this->user = $this->FB->api('/me');
					} catch (FacebookApiException $e) {
						error_log($e);
					}
				}

				$login = $this->FB->getLoginUrl();
				$logout = $this->FB->getLogoutUrl();	
			}

			$url = $this->controller->createAbsoluteUrl('facebook/default/login');

			$this->user ? $this->controller->redirect( $url ) : null;

			if(Yii::app()->user->isGuest)
			{
				$this->render('login',array(
					'session'=>$this->session,
					'user'=>$this->user,
					'login'=>$login,
					'logout'=>$logout,
					'appid'=>$appids)
				);   
			}
        }
              
}