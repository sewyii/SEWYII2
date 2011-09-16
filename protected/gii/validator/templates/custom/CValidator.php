<?php echo "<?php\n"; ?>

/**
 * <?php echo ucfirst($this->className)."Validator"; ?> is ...
 * @author <?php echo Yii::app()->params->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */
 
class <?php echo ucfirst($this->className).'Validator'; ?> extends <?php echo $this->baseClass."\n"; ?>
{
	/**
	 * Validates the attribute of the object.
	 * If there is any error, the error message is added to the object.
	 * @param CModel the data object being validated
	 * @param string the name of the attribute to be validated.
	 */
	protected function validateAttribute($object,$attribute){
		// your code here ...
	}
}