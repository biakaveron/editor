<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 *
 * @link http://tinymce.moxiecode.com
 *
 * Tiny_MCE driver library
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 */

class Kohana_Editor_Tinymce extends Editor {

	public static $path		  = 'media/tinymce';
	public static $scriptname = 'tiny_mce.js';
	
	public $theme			  = 'advanced';
	public $mode			  = 'exact';
	public $toolbar			  = array
	(
		'location'	  => 'top',
		'align'		  => 'left',
	);
	public $plugins			  = array();
	public $buttons1		  = array
	(
		'bold', 'italic', 'underline', 'strikethrough', '|',
		'justifyleft', 'justifycenter', 'justifyright', 'justifyfull',
		'bullist', 'numlist', 'outdent', 'indent'
	);
	public $buttons2		  = array();
	public $buttons3		  = array();

	public function css()
	{
		return array();
	}

	public function js()
	{
		return array(self::$path.'/'.self::$scriptname);
	}

	public function render($print = TRUE, $create_field = TRUE)
	{
		$result = '';

		if (TRUE == $create_field)
		{
			// Create textarea with some config values
			$result.= form::textarea($this->fieldname, $this->value, array('width'=>$this->width, 'height'=>$this->height, 'id'=>$this->fieldname))."\r\n";
		}

		// Init redactor object
		// Array settings should be joined into a string
		$result .= '<script language="javascript" type="text/javascript">
tinyMCE.init({
theme : "'.$this->theme.'",
mode: "'.$this->mode.'",
language: "'.self::$language.'",
elements : "'.$this->fieldname.'",
plugins : "'.implode(",", $this->plugins).'",
theme_advanced_toolbar_location : "'.$this->toolbar["location"].'",
theme_advanced_toolbar_align : "'.$this->toolbar["align"].'",
theme_advanced_buttons1 : "'.implode(",", $this->buttons1).'",
theme_advanced_buttons2 : "'.implode(",", $this->buttons2).'",
theme_advanced_buttons3 : "'.implode(",", $this->buttons3).'",
height:"'.$this->height.'px",
width:"'.$this->width.'px"
});
</script>';

		if ($print===TRUE)
		{
			// Echo code
			echo $result;
		}

		// return generated code
		return $result;
	}

	public function set($field, $value)
	{
		if (in_array($field, array('plugins', 'mode', 'theme', 'toolbar', 'buttons1', 'buttons2', 'buttons3')))
		{
			$this->$field = $value;
			return $this;
		}

		return parent::set($field, $value);
	}

}