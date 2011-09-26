<?php

class TopicController extends SEController
{
    public $layout='//layouts/column1';
	public function actionIndex()
	{
		$this->render('index');
	}
}