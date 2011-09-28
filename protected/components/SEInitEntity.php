<?php

/**
 * SEInitEntity class file.
 * @author Treitsiak A. <at@webmen.ca>
 * @version 0.0.1
 * @package SEWYII2
 * @since 1.0
 */

class SEInitEntity extends CApplicationComponent {
    /**
     * Initializes the application component.
     * This method is required by {@link IApplicationComponent} and is invoked by application.
     * If you override this method, make sure to call the parent implementation
     * so that the application component can be marked as initialized.
     */
    public function init() {
        parent::init();

        //Check whether there is an event initSystem, if not create it.
        if($this->hasEvent('onInitSystem'))
            $this->attachEventHandler('onInitSystem', array($this, '_initSystem'));

        //Check and launch event initSystem.
        if($this->hasEventHandler('onInitSystem'))
            $this->onInitSystem(new CEvent($this));
    }

    /**
     * Direct execution of system initialization events.
     * @param CEvent $event
     */
    public function onInitSystem($event) {
        $this->raiseEvent('onInitSystem',$event);
    }

    /**
     * Determine the basis of aliases.
     * @param CEvent $event
     */
    protected function _initSystem($event) {
        Yii::setPathOfAlias('temp',Yii::getPathOfAlias('webroot.tmp'));
        Yii::setPathOfAlias('behaviors',Yii::getPathOfAlias('application.behaviors'));
        Yii::setPathOfAlias('helpers',Yii::getPathOfAlias('application.helpers'));
        Yii::setPathOfAlias('filters',Yii::getPathOfAlias('application.filters'));
    }

    /**
     * Preliminary import elements of the system.
     */
    protected function _preImport() {
        Yii::import('behaviors.*');
    }

    /**
     * Logs a message.
     *
     * @param string $message Message to be logged
     * @param string $level Level of the message (e.g. 'trace', 'warning',
     * 'error', 'info', see CLogger constants definitions)
     */
    public static function log($message, $level='error') {
        Yii::log($message, $level, __CLASS__);
    }

    /**
     * Dumps a variable or the object itself in terms of a string.
     *
     * @param mixed variable to be dumped
     */
    protected function dump($var='dump-the-object',$highlight=true) {
        if ($var === 'dump-the-object') {
            return CVarDumper::dumpAsString($this,$depth=15,$highlight);
        } else {
            return CVarDumper::dumpAsString($var,$depth=15,$highlight);
        }
    }

}
