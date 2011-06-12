<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Editor_Core_CKEditor extends Editor {

	protected $_options = array(
		'toolbar'        => 'Basic', // Basic|Full or create your custom toolbar
		'skin'           => 'v2',
		'width'          => 600,
		'height'         => 300,
	);

	protected function _js()
	{
		$js = array(
			'ckeditor.js',
		);

		return $js;
	}

	protected function _css()
	{
		return array();
	}

	public $name = 'ckeditor';
}