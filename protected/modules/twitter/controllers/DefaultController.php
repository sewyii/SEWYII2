<?php

/**
 * TwitterModule default controller
 * 
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */

class DefaultController extends SEController
{   	
    public function actionCallback()
    {       
        if(Yii::app()->request->isName('oauth_token') && Yii::app()->request->isName('oauth_verifier'))
		{	
			$model= new TWLoginForm();	
			
			$model->session= TwitterEntity::getEntity(                        
                        Yii::app()->user->getState('oauth_token'),
						Yii::app()->user->getState('oauth_token_secret')						
			);	

			if($model->login())
					$this->redirect(Yii::app()->user->returnUrl);
		}
		
		$this->redirect(Yii::app()->homeUrl);
    }
}