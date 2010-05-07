<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
* Class for providing most known Text Editors like Tiny_MCE and FCKeditor
*
* @package    Editor
* @author     Brotkin Ivan (BIakaVeron) <BIakaVeron@gmail.com>
* @copyright  Copyright (c) 2009 Brotkin Ivan
*
*/

abstract class Kohana_Editor {

	public static $default_driver = 'markitup';

	public static $language		  = 'en';

	public static function factory($name = 'default')
	{
		$config = Kohana::config('editor')->$name;

		if ( ! isset($config['driver']) )
		{
			$config['driver'] = Editor::$default_driver;
		}

		$config['name'] = $name;

		$driver = 'Editor_'.ucfirst($config['driver']);

		$editor = new $driver($name, $config);

		return $editor/*->init($config)*/;
	}

	protected $_styles	= NULL;

	protected $_scripts = NULL;

	protected $_driver	= FALSE;

	protected $_name;

	public $width		= 500;

	public $height		= 200;

	public $fieldname	= 'text';

	public $value		= '';

	/**
	* Constructor
	*
	* @param   mixed   configuration array or profile name
	* @return  void
	*/
	public function __construct($name, $config = array())
	{

		$this->_driver = $driver = $config['driver'];

		$this->_name = $name;

		foreach($config as $field => $value)
		{
			if ( ! is_array($value))
			{
				$this->set($field, $value);
			}
		}
		
		$config['params'] = Kohana::config('editor/'.$driver)->get($name, array());

		if (isset($config['params']))
		{
			foreach($config['params'] as $key => $value)
			{
				$this->set($key, $value);
			}
		}

		return $this;
	}

	public function set($field, $value)
	{
		if (in_array($field, array('width', 'height', 'fieldname', 'value')))
		{
			$this->$field = $value;
		}

		return $this;
	}

	public function css()
	{
		// no CSS in use
		return array();
	}

	public function js()
	{
		// no JS in use
		return array();
	}

	/**
	* Display text redactor or returns redactor code
	*
	* @param   bool   outputs code directly if TRUE
	* @param   bool   creates textarea field if TRUE
	* @return  mixed  returns output code if $print==FALSE
	*/
	abstract public function render($print = TRUE, $create_field = TRUE);

	public function  __toString()
	{
		return $this->render(TRUE);
	}

}