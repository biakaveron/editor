<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * @link http://ckeditor.com
 *
 * CKEditor driver library
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 */

class Kohana_Editor_Ckeditor extends Editor
{

	public static $path		  = 'media/ckeditor';
	public static $scriptname = 'ckeditor.js';
	public static $configfile = 'config.js';

	public $skin			  = 'kama';
	public $theme			  = 'default';
	public $toolbar			  = 'Basic';

	public function js()
	{
		return array(self::$path.'/'.self::$scriptname);
	}

	public function render($print = TRUE, $create_field = TRUE)
	{

		if ( FALSE === self::$language)
		{
			self::$language = substr(I18n::$lang, 0, 2);
		}

		$result = '';

		if (TRUE == $create_field)
		{
			// Create textarea with some config values
			$result.= form::textarea($this->fieldname, $this->value, array('width'=>$this->width, 'height'=>$this->height, 'id'=>$this->fieldname))."\r\n";
		}

		$result .= '<script type="text/javascript">
//<![CDATA[

CKEDITOR.replace( "'.$this->fieldname.'",
{
	language: "'.self::$language.'",
	skin : "'.$this->skin.'",
	theme: "'.$this->theme.'",
	toolbar: "'.ucfirst($this->toolbar).'",
	width: "'.intval($this->width).'",
	height: "'.intval($this->height).'",
	customConfig: "'.url::base().self::$path.'/'.self::$configfile.'",
});

//]]>
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
		if (in_array($field, array('skin', 'theme', 'toolbar')))
		{
			$this->$field = $value;
		}
		elseif ($field == 'configfile')
		{
			self::$$field = $value;
		}

		return $this;
	}

}
