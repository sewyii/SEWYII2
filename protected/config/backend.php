<?php
$config =  CMap::mergeArray(
        require(dirname(__FILE__).'/core.php'),
        array(
        'components'=>array(
               // 'user'=>array(
                // enable cookie-based authentication
               //         'allowAutoLogin'=>true,
               // ),
                // uncomment the following to enable URLs in path-format

                'urlManager'=>array(
                        'rules'=>array(
                                '' => 'backend/index',
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
