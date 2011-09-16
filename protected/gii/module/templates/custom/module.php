<?php echo "<?php\n"; ?>
/**
 * <?php echo $this->moduleClass; ?> 
 * @author <?php echo Yii::app()->param->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */

class <?php echo $this->moduleClass; ?> extends SEModule
{
	public function init()
	{
		parent::init();

		// import the module-level models and components
		$this->setImport(array(
			'<?php echo $this->moduleID; ?>.models.*',
			'<?php echo $this->moduleID; ?>.components.*',
		));
	}
}