<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 *
 * @link http://markitup.jaysalvat.com
 *
 * MarkItUp! driver library
 *
 * @package    Editor
 * @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
 * @copyright  Copyright (c) 2009 Brotkin Ivan
 */

class Kohana_Editor_Markitup extends Editor
{

	public static $path			= 'media/markitup';
	public static $setspath		= 'sets';
	public static $skinspath	= 'skins';
	public static $scriptname	= 'jquery.markitup.pack.js';
	public static $jquerypath	= 'media/jquery.pack.js';
	public static $use_jquery	= TRUE;

	public $toolbarset			= 'default';
	public $skin				= 'markitup';

	public function css()
	{
		if (is_null($this->_styles))
		{
			$this->_styles = array
			(
				self::$path.'/'.self::$setspath.'/'.$this->toolbarset.'/style.css',
				self::$path.'/'.self::$skinspath.'/'.$this->skin.'/style.css',
			);
		}

		return $this->_styles;
	}

	public function js()
	{

		if (is_null($this->_scripts))
		{
			$this->_scripts = array();

			if (self::$use_jquery)
			{
				$this->_scripts[] = self::$jquerypath;
			}

			$this->_scripts[] = self::$path.'/'.self::$scriptname;
			$this->_scripts[] = self::$path.'/'.self::$setspath.'/'.$this->toolbarset.'/set.js';
		}

		return $this->_scripts;
	}

	public function render($print = TRUE, $create_field = TRUE)
	{
		$result = '';

		if (TRUE == $create_field) {
			// Create textarea with some config values
			$result.= form::textarea($this->fieldname, $this->value, array('width'=>$this->width, 'height'=>$this->height, 'id'=>$this->fieldname))."\r\n";
		}

		// Init redactor object
		// Array settings should be joined into a string
		$result .= '<script language="javascript" type="text/javascript">
<!--
$(document).ready(function()	{
// $("textarea").markItUp( { Settings }, { OptionalExtraSettings } );
$("#'.$this->fieldname.'").markItUp(mySettings);
});
-->
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
		if (in_array($field, array('toolbarset', 'skin')))
		{
			$this->$field = $value;
			return $this;
		}

		return parent::set($field, $value);
	}
}