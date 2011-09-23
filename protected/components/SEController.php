<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class SEController extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to 'application.views.layouts.column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

     /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $model->scenario.'-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }	
	
	public function render($view, $data = null, $return = false)
	{
		$this->onBeforeRender(new CEvent($this));
		parent::render ($view, $data, $return);
		$this->onAfterRender(new CEvent($this));
	}
	
	public function onBeforeRender($event)
	{
		$this->raiseEvent('onBeforeRender', $event);
	}
	
	public function onAfterRender($event)
	{
		$this->raiseEvent('onAfterRender', $event);
	}
	
}