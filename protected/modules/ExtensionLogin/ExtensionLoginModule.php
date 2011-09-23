<?php
/**
 * ExtensionLoginModule
 * @author Serov Alexander <serov.sh@gmail.com>
 * @version
 * @package sewyii2
 * @since 1.0
 */

class ExtensionLoginModule extends SEModuleEntity {
    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
                'extensionLogin.models.*',
                'extensionLogin.components.*',
        ));
    }

    public function getHandlers() {
        return array(
            array('event'=>'onPrintLoginForm',
                    'handler'=>array(new ExtensionLogin,'printLinks')
            ),
            //только как пример того как можно переопределить весь action
           // array('event'=>'onLogin',
             //       'handler'=>array(new Facebook,'login')
            //),
        );
    }

    public function beforeControllerAction($controller, $action) {
        if(parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
}
