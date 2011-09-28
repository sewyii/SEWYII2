<?php

class UserController extends SEFrontendController {

    public function accessRules() {
        return array(
                array('allow',
                        'roles'=>array('user'),
                        'actions'=>array('index'),
                ),

                array('allow',
                        'roles'=>array('vip'),
                        'actions'=>array('vip'),
                ),
                array('deny',
                        'users'=>array('*'),
                //'actions'=>array('*'),
                ),
        );
    }
    public function actionIndex() {
        $this->render('index');
    }

     public function actionVip() {
        $this->render('vip');
    }

    // Uncomment the following methods and override them if needed
    /*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
    */
}