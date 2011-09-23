<?php

class FrontendController extends SEController {
    public $layout = 'column1';
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF,
                ),
                // page action renders "static" pages stored under 'protected/views/site/pages'
                // They can be accessed via: index.php?r=site/page&view=FileName
                'page'=>array(
                        'class'=>'CViewAction',
                ),
        );
    }
    public function behaviors() {
        return array(

                // configure the signal behavior
                'EventBehavior' => array(

                // class path to the behavior in alias notation
                        'class' => 'application.behaviors.EventBehavior',

                        // This is optional. If we don't provide it, every event this
                        // component raises might be emitted as a signal. But since we
                        // don't want to emit onAfterConstruct-, onAfterFind-,
                        // onAfterXyz-Signals (those are too low-level), we can save some
                        // overhead by explicitly specifying only the onPostPublished-Event
                        // to be emitted as a signal.
                        'events' => array(
                                'onLogin',
                        ),
                ),
        );
    }
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'


        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model=new ContactForm;
        if(isset($_POST['ContactForm'])) {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate()) {
                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }

    public function onLogin(CEvent $event) {
        $this->raiseEvent('onLogin', $event);
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        
       

        $arr = Yii::app()->request->getArray('LoginForm', array(), 'POST');
        $model=new LoginForm;

        if(!empty($arr)) {
            $model->attributes=$arr;
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        //print_r($model->errors);

        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }


    public function actionRegistration() {
        if (Yii::app()->user->isGuest) {
            $user = new User('registration');
            $this->performAjaxValidation($user);
            if(empty($_POST['User'])) {
                $this->render('registration', array('model' => $user));
            } else {
                if(CActiveForm::validate($user)) {
                    $user = User::registrationUser($_POST['User']);
                    if(empty($user->errors)>0) {
                        $this->render("reg_success", array('model'=>$user));
                        Yii::app()->end();
                    }
                }
                $this->render('registration', array('model'=>$user));
            }
        } else {
            /*
            * Если пользователь залогинен редиректим обратно
            */
            $this->redirect(Yii::app()->homeUrl.'/');
        }


    }
}