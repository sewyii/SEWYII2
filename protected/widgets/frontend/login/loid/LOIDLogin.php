<?php

Yii::import('application.modules.loid.components.LightOpenIdEntity');

class LOIDLogin extends CInputWidget{
      
    private $LOID;

    public function run()
	{        
			if(Yii::app()->user->isGuest)
			{
                $this->LOID = LightOpenIdEntity::getEntity();
				$this->render('login',array('loginUrl'=>$this->LOID->authUrl())); 				  
			}			
      }
              
}