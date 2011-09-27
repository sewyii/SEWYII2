<?php

require_once(dirname(__FILE__).'/../vendor/OAuth.php');
require_once(dirname(__FILE__).'/../vendor/twitteroauth.php');

class TwitterEntity extends TwitterOAuth
{
    static public $instance;
    
    public function __construct($oauth_token = NULL, $oauth_token_secret = NULL) 
    {
		$module = Yii::app()->getModule('twitter');
		
		$consumer_key = $module->consumer_key;
		$consumer_secret = $module->consumer_secret;
		
        parent::__construct($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);
    }
    
    /**
     * Singleton
     * @param type $consumer_key
     * @param type $consumer_secret
     * @param string $oauth_token
     * @param string $oauth_token_secret
     * @return TwitterOAuth
     */
    static public function getEntity($oauth_token = NULL, $oauth_token_secret = NULL, $new = false)
    {
        if(is_null(self::$instance))		
            self::$instance= new TwitterEntity ($oauth_token, $oauth_token_secret);
			        
        return self::$instance;
    }
}




