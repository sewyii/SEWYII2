<?php echo "<?php\n"; ?>

/**
 * <?php echo ucfirst($this->className)."Command"; ?> is ...
 * @author <?php echo Yii::app()->param->developer ?> 
 * @version 
 * @package SEWYII2
 * @since 1.0
 */
 
class <?php echo ucfirst($this->className)."Command"; ?> extends <?php echo $this->baseClass."\n"; ?>
{
	/**
	 * Executes the command.
	 * @param array command line parameters for this command.
	 */
    public function run($args)
    {
        // $args gives an array of the command-line arguments for this command
    }
	/**
	 * Provides the command description.
	 * This method may be overridden to return the actual command description.
	 * @return string the command description. Defaults to 'Usage: php entry-script.php command-name'.
	 */
    public function getHelp()
    {
        return 'Usage: how to use this command';
    }

    /**
     * Dumps a variable or the object itself in terms of a string.
     *
     * @param mixed variable to be dumped
     */
    protected function dump($var='dump-the-object',$highlight=true)
    {
        if ($var === 'dump-the-object') {
            return CVarDumper::dumpAsString($this,$depth=15,$highlight);
        } else {
            return CVarDumper::dumpAsString($var,$depth=15,$highlight);
        }
    }
}