<?php
/**
 * FacebookModule 
 * @author Treitjak A. <at@webmen.ca> 
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class FacebookModule extends SEModuleEntity
{
	public $appId;
	public $secret;
	public $cookie;
	
	public function init()
	{
		parent::init();

		// import the module-level models and components
		$this->setImport(array(
			'facebook.models.*',
                    	'facebook.components.*',
                        'facebook.vendor.*',
		));			
	}
        
        public function events()
        {
            return array(
                'onLogin'=>array($this, 'login')
            );
        }
        
        public function login($event)
        {
            $event->sender->beginClip('facebook');
                $event->sender->widget('application.modules.Facebook.widgets.FbLogin'); 
            $event->sender->endClip();
        }
}