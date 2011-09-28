<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return CMap::mergeArray(
        require(dirname(__FILE__).'/core.php'),
        array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'SEWYII',
        'import'=>array(
                'application.interfaces.*',
                'application.actions.*',
                'application.behaviors.*',
                'application.models.*',
                'application.components.*',
                'application.filters.*',
                'application.helpers.*',
                'application.widgets.*',
        ),
        // application components
        'components'=>array(
                'db'=>require(dirname(__FILE__) . '/db.php'),
        // uncomment the following to use a MySQL database
        /*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
        */
        ),
));