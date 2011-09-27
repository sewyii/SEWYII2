<?php
/**
 * TwitterModule 
 * @author Treitsiak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package Facebook SEWYII
 * @since 1.0
 */

class TwitterModule extends SEModuleEntity
{
    //The Twitter Apps key, set in config.
    public $consumer_key = '';
	
    //The Twitter Apps secret key, set in config.	
    public $consumer_secret = '';
	
    //The call back url for twitter
    public $callback = '';		
    
    public $images;
    
    public function init()
    {
        parent::init();

	// import the module-level models and components
	$this->setImport(array(
            'twitter.models.*',
            'twitter.components.*',
            'twitter.vendor.*',
	));
    }
}