<?php
/**
 * JSimpleFilter class file.
 *
 * @author Stefan Volkmar <volkmar_yii@email.de>
 * @version 1.4
 * @license BSD
 */

/**
 * <p>JSimpleFilter is a widget that simply filters an array of strings by some input.</p>
 * <p>see:<a href="http://www.jkdesign.org/filter/">jQuery Simple Filter</a></p>
 *
 * @author Stefan Volkmar <volkmar_yii@email.de>
 */
Yii::setPathOfAlias('JSimpleFilter',dirname(__FILE__));

class JSimpleFilter extends CInputWidget
{
	/**
	 * @var array data that would be saved as client-side data to provide candidate selections.
	 * Each array element can only be string.
	 */
	public $data;

	/**
	 * @var mixed the CSS file used for the widget. 
	 * If false, the default CSS file will be used. Otherwise, the specified CSS file
	 * will be included when using this widget.
	 */
	public $cssFile=false;

	/**
	 * @var integer If provided, result filter list will only
	 * contain up to this many entries
	 */
	public $maxListEntries = 20;

	/**
	 * @var boolean If true, must match case as well as text value
	 *
	 */
	public $caseSensitive = false;

	/**
	 * @var boolean Quicksilver matches entries by scoring characters, if set
	 * to false, simpleFilter will use a straight first-to-last character matching (in order) instead
	 */
	public $useQuicksilver = true;

	/**
	 * @var boolean If true, when the input has focus and the up or down keys are pressed,
	 *
	 */
	public $showAll = false;

	/**
	 * @var integer Where to place list (variable=0, above=1, below=2);
	 *
	 */
	public $position = null;

	/**
	 * @var integer How to sort results (none=0, score=1, alpha=2)
	 *
	 */
	public $sortBy = null;

	/**
	 * @var integer Milliseconds to wait after key up before filtering
	 *
	 */
	public $waitTime = 50;

	/**
	 * @var string javascript callback function - called after every filtering
	 *
	 */
	public $postFilter = null;


    protected $baseUrl;

	/**
	 * Initializes the widget.
	 */
	public function init()
	{      	

		if(!is_array($this->data))
            throw new CException(Yii::t("JSimpleFilter.main",
                    'Invalid type. Property "data" must be an array.'));

      	$this->baseUrl = CHtml::asset(dirname(__FILE__).'/assets');

		list($name,$id)=$this->resolveNameID();
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];
		else
			$this->htmlOptions['name']=$name;

		$this->registerClientScript();

		if($this->hasModel()){
			echo CHtml::activeTextField($this->model,$this->attribute,
                $this->htmlOptions);
		} else {
			echo CHtml::textField($name,$this->value,$this->htmlOptions);
		}
	}

	/**
	 * Registers the needed CSS and JavaScript.
	 */
	public function registerClientScript()
	{
		$id=$this->htmlOptions['id'];

		$acOptions=$this->getClientOptions();
		$options=$acOptions===array()?'{}' : CJavaScript::encode($acOptions);
		
      	$baseUrl = CHtml::asset(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
        $url = ($this->cssFile!==false)
             ? $this->cssFile
             : $baseUrl.'/css/jquery.simpleFilter.css';
        		
		$cs=Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery')
           ->registerCssFile($url);
        if ($this->useQuicksilver)
            $cs->registerScriptFile($baseUrl.'/js/jquery.quicksilver.js');
        $cs->registerScriptFile($baseUrl.'/js/jquery.simpleFilter.min.js');
		if($this->cssFile!==false)
			$this->registerCssFile($this->cssFile);

        $cs->registerScript(__CLASS__.'#'.$id,"jQuery(\"#{$id}\").simpleFilter($options);", CClientScript::POS_READY);
	}

	/**
	 * @return array the javascript options
	 */
	protected function getClientOptions()
	{
	    $options = array();
		if($this->data!==null){
			$options['data']=$this->data;
		}

		static $properties=array(
			'maxListEntries', 'caseSensitive', 'useQuicksilver',
			'showAll', 'position', 'sortBy', 'waitTime');

		foreach($properties as $property)
		{
			if($this->$property!==null)
				$options[$property]=$this->$property;
		}

        if(is_string($this->postFilter) && strncmp($this->postFilter,'js:',3))
				$options[postFilter]='js:'.$this->postFilter;
		return $options;
	}
}
