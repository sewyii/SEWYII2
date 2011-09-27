<?php

/**
 * LoidModule default controller
 * 
 * @package WebMenYii CMS 
 * $subpackage LoidModule * @author Treitsiak A.A. (info@webmen.ca)
 * @copyright WebMenYii CMS (www.cms.webmen.ca) 
 * @version 1.0
 * @since 1.0
 */

class DefaultController extends WFrontendController
{
	public function actionLogin()
	{
		$model = new LOIDLoginForm();
		
		$model->session= LightOpenIdEntity::getEntity();
				
		if($model->login())
			$this->redirect(Yii::app()->user->returnUrl);
	}
}