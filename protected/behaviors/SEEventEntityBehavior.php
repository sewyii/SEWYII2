<?php

/**
 * Behavior to work with global events.
 * @author Treitjak A. <at@webmen.ca>
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */
class SEEventEntityBehavior extends CBehavior
{
    /**
     * The path to the configuration file.
     * @var string
     */
    public $path;

    /**
     * The application configuration file.
     * @var mixed {@link CConfiguration}
     */
    public $config;

    /**
     * An array with all the particular events and corresponding event handlers.
     * @var mixed
     */
    private $_events;

    /**
     * Initialization and configuration, preparation for processing.
     */
    public function __construct()
    {
	if(empty($this->path))
	    $this->path = Yii::getPathOfAlias('application.config') .DIRECTORY_SEPARATOR. 'frontend.php';

	if(empty($this->config))
	    $this->config = new CConfiguration($this->path, true);
    }

    /**
     * Attaches the events object to the component.
     * @param CComponent $owner the component that this events is to be attached to.
     */
    public function attach($owner)
    {
	parent::attach($owner);
        $this->attachEventHandlers('components');
        $this->attachEventHandlers('modules');
    }

    /**
     * Review the settings for each component, if determined
     * appropriate event handlers and event handlers to add events.
     * All handlers are added to the end of the list.
     *
     * Events can be defined in the configuration file two ways:
     * 1)The handler is a component.
     * <pre>
     * 'events'=>array('onSomeEvent'=>'someHandler')
     * </pre>
     * 2)The handler is in a predefined class.
     * <pre>
     * 'events'=>array('onSomeEvent'=>array('someClass','someHandler'))
     * </pre>
     *
     * @param string $type (components|modules)
     */
    protected function attachEventHandlers($type)
    {
        foreach(array_keys($this->config[$type]) as $item)
        {
	    if(isset($this->config[$type][$item]['events']))
            {
		foreach($this->config[$type][$item]['events'] as $event => $handler)
                {
		    if($this->getOwner()->hasEvent($event)) {
			if(is_string($handler)){
			    //If the event is definitely for option 1)
			    $this->getOwner()->attachEventHandler($event,array($this->getObjectType($item, $type), $handler));
			} elseif(is_array($handler)) {
			    //If the event is definitely for option 2)
			    list($object, $method) = $handler;

			    //For modules are initialized.
			    if($type == 'modules')
				$this->initModule($item);

			    $this->getOwner()->attachEventHandler($event,(array(new $object, $method)));
			}
		    } else {
			throw new CException(Yii::t('sewyii','The {event} is not defined in the {class}.',
			    array('{class}'=>get_class($this->getOwner()), '{event}'=>$event)));
		    }
                }
	    }
        }
	unset($object, $handler, $type);
    }

    /**
     * Return the object which defines the event handler.
     * @param string $id
     * @param string $type
     * @return mixed (CComponent|CModule)
     */
    protected function getObjectType($id, $type)
    {
	if($type == 'components') {
	    return Yii::app()->getComponent($id);
        } elseif($type == 'modules') {
	    return Yii::app()->getModule($id);
        }
    }

    /**
     * Initializes the module for preloading the required classes.
     * @param string $id Indifikator module in the application.
     */
    protected function initModule($id)
    {
	Yii::app()->getModule($id);
    }
}
