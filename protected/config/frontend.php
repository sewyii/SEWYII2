<?php
$config =  CMap::mergeArray(
        require(dirname(__FILE__).'/core.php'),
        array(
        'theme'=>'classic',
        'import'=>array(

                'application.controller.frontend.*',
        ),
        'components'=>array(
                'init'=>array(
                        'class'=>'application.components.SEFrontendInit'
                ),
                'user'=>array(
                // enable cookie-based authentication
                        'class'=>'application.components.SEFrontendUser',
                        'allowAutoLogin' => true,
                //     'autoRenewCookie'=>true,
                ),
                // 'user'=>array(
                // enable cookie-based authentication
                //         'allowAutoLogin'=>true,
                // ),
                // uncomment the following to enable URLs in path-format

                'urlManager'=>array(
                        'rules'=>array(
                                '' => '/site/index',
                                'index'=>'/site/index',
                                'login'=>'/site/login',
                                'registration'=>'/site/registration',
                                'logout'=>'/site/logout',
                                'user'=>'/user/index',
                                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                        ),
                ),


                'errorHandler'=>array(
                // use 'site/error' action to display errors
                        'errorAction'=>'/site/error',
                ),
        ),
        )
);
return $config;
?>
