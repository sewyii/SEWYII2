<?php
$config =  CMap::mergeArray(
        require(dirname(__FILE__).'/core.php'),
        array(
        'theme'=>'classic',
        'components'=>array(
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
        )
);
return $config;
?>
