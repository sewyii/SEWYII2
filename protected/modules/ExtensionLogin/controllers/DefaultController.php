<?php

class DefaultController extends FrontendController {

    public function actionIndex() {
        //Yii::app()->getModule('extlogin')->onLogin->insertAt(0,array($this, 'print3'));
        $this->render('index');
        //Yii::app()->getModule('extlogin')->onLogin(array($this, 'print3'));
    }

    public function actionFacebook() {
        FacebookAuth::login();
        $this->render('facebook');
    }
}