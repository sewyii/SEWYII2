<?php

class ExtLoginModule extends SEModuleEntity {
    public function init() {

        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
           //     'extlogin.models.*',
                //'ExtLogin.components.*',
        ));



    }

    public function print1($event) {
        echo '<strong>Печатаем при в первом обработчике</strong><br />';
    }
    public function print2($event) {
        echo '<p>Печатаем во втором обработчике!</p>';
    }


    public function getHandlers() {
        return array(
            array('event'=>'onLogin',
                    'handler'=>array($this,'print1')
            ),
            array('event'=>'onLogin',
                    'handler'=>array($this,'print2')
            ),
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
