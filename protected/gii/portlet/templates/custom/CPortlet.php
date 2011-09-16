<?php echo "<?php\n"; ?>

/**
 * <?php echo ucfirst($this->className)."Portlet"; ?> is ...
 * @author <?php echo Yii::app()->params->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */
 
class <?php echo ucfirst($this->className)."Portlet"; ?> extends <?php echo $this->baseClass."\n"; ?>
{
	/**
	 * Renders the content of the portlet.
	 */
	protected function renderContent()
	{
	}
}