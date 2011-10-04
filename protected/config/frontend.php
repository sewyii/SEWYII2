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
                                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'frontend/<controller>/<action>',
                                '<controller:\w+>/<action:\w+>'=>'frontend/<controller>/<action>',

                        ),
                ),


                'errorHandler'=>array(
                // use 'site/error' action to display errors
                        'errorAction'=>'frontend/site/error',
                ),
        ),
		'modules'=>array(
			'facebook'=>array(
			'devappid'=>'',
			'devsecret'=>'',
			'cookie'=>TRUE,
			),
			'twitter'=>array(
				'consumer_key'=>'',
				'consumer_secret'=>'',
				'callback'=>'http://sewyii.dev/?r=twitter/default/callback',				
			),
			'loid'=>array(
				'identity'=>'http://openid-provider.appspot.com',
				'required'=>array('namePerson/friendly', 'contact/email'),
				'callback'=>'http://sewyii.dev/?r=loid/default/callback',				
			),
		),
        )
);
return $config;
?>
