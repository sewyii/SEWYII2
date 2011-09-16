<?php echo "<?php\n"; ?>

/**
 * <?php echo ucfirst($this->className)."Event"; ?> represents the parameter for the ... event.
 * @author <?php echo Yii::app()->params->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */

class <?php echo ucfirst($this->className)."Event"; ?> extends <?php echo $this->baseClass."\n"; ?>
{
    /**
     * Constructor.
     * @param mixed sender of the event
     */
    public function __construct($sender=null,$params=null)
    {
        parent::___construct($sender, $params);
    }
}