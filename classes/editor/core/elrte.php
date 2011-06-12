<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Editor_Core_Elrte extends Editor {

	protected $_options = array(
		'width'           => 800,
		'height'          => 300,
		'toolbar'         => 'normal', // tiny|compact|normal|complete|maxi
	);

	protected function _js()
	{
		$js = array(
			'elrte.min.js',
		);

		if ($this->lang() != 'en')
		{
			$js[] = 'i18n/elrte.'.$this->lang().'.js';
		}

		return $js;
	}

	protected function _css()
	{
		return array(
			'elrte.min.css',
		);
	}

	public $name = 'elrte';

}