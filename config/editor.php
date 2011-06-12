<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(

	'default_driver'  => 'elrte',

	'drivers'         => array(
		'tinymce'         => array(
			'js_path'        => 'media/editor/tinymce/js/',
			'options'        => array(
				'theme'         => 'advanced',
			),
		),
		'elrte'           => array(
			'css_path'       => 'media/editor/elrte/css/',
			'js_path'        => 'media/editor/elrte/js/',
		),
		'ckeditor'         => array(
			'js_path'         => 'media/editor/ckeditor/',
		),
		'markitup'         => array(
			'js_path'         => 'media/editor/markitup/',
			// no css_path, only skins&sets here!
			'skin_path'       => 'media/editor/markitup/skins/',
			'set_path'        => 'media/editor/markitup/sets/',
		),
	),

	'custom'          => array(
		'test'           => array(
			'driver'        => 'tinymce',
			'options'       => array(
				'width'        => 700,
				'height'       => 300,
				'theme_advanced_toolbar_location' => "top",
			),
		)
	)
);