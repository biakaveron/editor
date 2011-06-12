<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Editor_Core_MarkItUp extends Editor {

	protected $_js_prefix = FALSE;
	protected $_css_prefix = FALSE;

	/**
	 * Default MarkItUp options
	 *
	 * @var array
	 */
	protected $_options = array(
		'set'    => 'default',
		'skin'   => 'markitup',
		'width'  => 800,
		'height' => 300,
	);


	protected function _js()
	{
		$js = array(
			trim($this->_config['js_path'], '/').'/jquery.markitup.js',
			trim($this->_config['set_path'], '/').'/'.$this->_options['set'].'/set.js',
		);

		/*if ($this->lang() != 'en')
		{
			$js[] = 'i18n/elrte.'.$this->lang().'.js';
		}*/

		return $js;
	}

	protected function _css()
	{
		return array(
			trim($this->_config['skin_path'], '/').'/'.$this->_options['skin'].'/style.css',
			trim($this->_config['set_path'], '/').'/'.$this->_options['set'].'/style.css',
		);
	}

	public $name = 'markitup';

}