<?php
/**
 * ExtensionLogin class.
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package SEWYII2
 * @since 1.0
 */

class ExtensionLogin extends SEExtensionsEntity {

    public $identity;
    /**
     * Returns the static model of the specified AR class.
     * @return Facebook the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }




    static function login($id_user) {
        $identity=new SEUserIdentity(0,0);
        $identity->setOtherEnter($id_user);
        //$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
        $duration=3600*24*30; // 30 days
        Yii::app()->user->login($identity,$duration);
        Yii::app()->controller->redirect(Yii::app()->user->returnUrl);
    }

    public function loginError($e='') {
        Yii::app()->controller->render('application.modules.ExtensionLogin.views.default.error');
         //Yii::app()->controller->render('application.modules.ExtensionLogin.views.default.login', array('model'=>$model));
        Yii::app()->end();

    }

    
    public function printLinks() {
        Yii::app()->controller->renderPartial('application.modules.ExtensionLogin.views.default.links');
    }
}
