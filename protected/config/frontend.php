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
                                '' => 'frontend/site/index',
                                'index'=>'frontend/site/index',
                                'login'=>'frontend/site/login',
                                'registration'=>'frontend/site/registration',
                                'logout'=>'frontend/site/logout',
                        ),
                ),


                'errorHandler'=>array(
                // use 'site/error' action to display errors
                        'errorAction'=>'frontend/site/error',
                ),
        ),
        )
);
return $config;
?>
