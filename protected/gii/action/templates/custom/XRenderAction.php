<?php echo "<?php\n"; ?>

/**
 * <?php echo ucfirst($this->className)."Action"; ?> is ...
 * @author <?php echo Yii::app()->params->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */

class <?php echo ucfirst($this->className).'Action'; ?> extends <?php echo $this->baseClass."\n"; ?>
{

    public function run()
    {
        // place the action logic here
    }
}