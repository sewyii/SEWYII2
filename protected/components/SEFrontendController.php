<?php

class SEFrontendController extends SEController {
    public $layout = 'column1';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('*'),
            ),
    
        );
    }
    /**
     * Declares class-based actions.
     */
   
}