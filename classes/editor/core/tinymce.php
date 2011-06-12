<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Editor_Core_TinyMCE extends Editor {

	protected function _js()
	{
		$js = array(
			'tiny_mce_src.js',
		);

		return $js;
	}

	protected function _css()
	{
		return array();
	}

	public $name = 'tinymce';

}