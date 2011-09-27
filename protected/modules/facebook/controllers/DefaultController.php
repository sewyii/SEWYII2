<?php

/**
 * FacebookModule default controller
 * 
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */

class DefaultController extends SEController
{	
	public function actionLogin()
	{
		$model= new FBLoginForm();
		
		$model->session= FacebookEntity::getEntity(array(
		  'appId' => $this->module->devappid,
		  'secret' => $this->module->devsecret,
		  'cookie' => $this->module->cookie,
		));
				
		if($model->login())
			$this->redirect(Yii::app()->user->returnUrl);
	}
}