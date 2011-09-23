<?php
$config =  CMap::mergeArray(
        require(dirname(__FILE__).'/dev_conf.php'),
        array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'My Web Application',
        'language' => 'ru',

        // preloading 'log' component
        'preload'=>array('log',''),

        // autoloading model and component classes
        'import'=>array(
                'application.models.*',
                'application.components.*',
                'application.controllers.*',
        ),

        'modules'=>array(
        // uncomment the following to enable the Gii tool

                'gii'=>array(
                        'class'=>'system.gii.GiiModule',
                        'password'=>'admin',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                //	'ipFilters'=>array('127.0.0.1','::1'),
                ),

                'extensionLogin'=>array(
                        'class'=>'application.modules.ExtensionLogin.ExtensionLoginModule',
                ),
                // configure the signals module


        ),

        // application components
        'components'=>array(

        // uncomment the following to enable URLs in path-format
                'urlManager'=>array(
                        'urlFormat'=>'path',
                        'rules'=>array(
                                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                        ),
                        'showScriptName'=>false,
                ),
                'db' => require(dirname(__FILE__) . '/db.php'),

                'authManager'=>array(
                        'class'=>'CDbAuthManager',
                        'connectionID'=>'db',
                        'itemTable'=>'{{auth_item}}',
                        'itemChildTable'=>'{{auth_item_child}}',
                        'assignmentTable'=>'{{auth_assignment}}',
                ),
                'request'=>array(
                        'class'=>'application.components.SERequest',
                        'enableCsrfValidation'=>true,
                        'enableCookieValidation'=>true,
                ),

                'errorHandler'=>array(
                // use 'site/error' action to display errors
                //  'errorAction'=>'site/error',
                ),
                'log'=>array(
                        'class'=>'CLogRouter',
                        'routes'=>array(
                                array(
                                        'class'=>'CFileLogRoute',
                                        'levels'=>'error, warning',
                                ),
                        // uncomment the following to show log messages on web pages
                        /*
				array(
					'class'=>'CWebLogRoute',
				),
                        */
                        ),
                ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
        // this is used in contact page
                'adminEmail'=>'webmaster@example.com',
        ),
        )
);
return $config;
?>
