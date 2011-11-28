<?php
/**
 * JPopupWindow class file.
 *
 * @author Stefan Volkmar <volkmar_yii@email.de>
 * @license BSD
 * @version 1.1
 * 
 */

/** 
 *
 * This widget encapsulates the popupWindow JQuery Plugin.
 * Takes a link and will create a popupwindow
 * ({@link http://swip.codylindley.com/popupWindowDemo.html}).
 *
 * @author Stefan Volkmar <volkmar_yii@email.de>
 */

class JPopupWindow extends CWidget
{
    /**
	 * @var string Specifies the URL of the page to open.
     * If no URL is specified, a new window with about:blank is opened
	 */
    public $url;

    /**
	 * @var string Specifies the target attribute or the name of the window.
     * Defaults to "_blank"
     *
     * The following values are supported:
     *
     * - _blank - URL is loaded into a new window. This is default
     * - _parent - URL is loaded into the parent frame
     * - _self - URL replaces the current page
     * - _top - URL replaces any framesets that may be loaded
     * - name - The name of the window set from the name attribute of the
     *   element that invokes the click
	 */
    public $name="_blank";

    /**
	 * @var string the tag name of the generated HTML element
	 */
    public $tagName='a';
	/**
	 * @var array the content to be enclosed between open and close element tags.
	 */
    public $content;
	
	/**
	 * @var array the HTML attributes for the tag.
	 */
	public $htmlOptions=array();

	/**
	 * @var array the initial JavaScript options that should be passed to the plugin.
     *
     * centerBrowser:0, // center window over browser window? {1 (YES) or 0 (NO)}. overrides top and left
     * centerScreen:0, // center window over entire screen? {1 (YES) or 0 (NO)}. overrides top and left
     * height:500, // sets the height in pixels of the window.
     * left:0, // left position when the window appears.
     * location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
     * menubar:0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
     * resizable:0, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
     * scrollbars:0, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
     * status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
     * width:500, // sets the width in pixels of the window.
     * windowName:null, // name of window set from the name attribute of the element that invokes the click
     * windowURL:null, // url used for the popup
     * top:0, // top position when the window appears.
     * toolbar:0 // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
     * @see: http://www.w3schools.com/jsref/met_win_open.asp
	 */
	public $options=array();

	/**
	 * Initializes the widget.
	 * This method registers all needed client scripts 
	 */
	public function init()
	{
		parent::init();

		$id=$this->getId();
		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;

        if ($this->url)
            $this->options['windowURL']=CHtml::normalizeUrl($this->url);

        if ($this->name)
            $this->options['windowName']=$this->name;

		      	
      	$baseUrl = CHtml::asset(dirname(__FILE__).DIRECTORY_SEPARATOR.'assets');
        $jsFile = (YII_DEBUG)?'/js/jquery.popupWindow.js':'/js/jquery.popupWindow.min.js';
        $options=empty($this->options) ? '' : CJavaScript::encode($this->options);

        Yii::app()->getClientScript()
           ->registerScriptFile($baseUrl.$jsFile)
           ->registerScript(__CLASS__.'#'.$id,"jQuery('#$id').popupWindow($options);");

	}

	/**
	 * Generates a tag wich open a window by mouse click.
	 */
	public function run()
	{
        $tag = strtolower($this->tagName);
        switch ($tag){
            case 'img':
            case 'br':
            case 'hr':
            case 'input':
                CHtml::openTag($tag, $this->htmlOptions);
            default:
                echo CHtml::tag($tag, $this->htmlOptions, $this->content);
        }
    }
}
