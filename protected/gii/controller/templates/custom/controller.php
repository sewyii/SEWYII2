<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->controllerClass; ?> 
 * @author <?php echo Yii::app()->params->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
<?php foreach($this->getActionIDs() as $action): ?>
	public function action<?php echo ucfirst($action); ?>()
	{
		$this->render('<?php echo $action; ?>');
	}

<?php endforeach; ?>
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}