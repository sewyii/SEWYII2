<?php
$config =  CMap::mergeArray(
        require(dirname(__FILE__).'/core.php'),
        array(
        'theme'=>'classic',
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
                                '' => 'frontend/index',
                                'index'=>'frontend/index',
                                'login'=>'frontend/login',
                                'registration'=>'frontend/registration',
                                'logout'=>'frontend/logout',
                        ),
                ),


                'errorHandler'=>array(
                // use 'site/error' action to display errors
                        'errorAction'=>'frontend/error',
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
