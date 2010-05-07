<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Use this configuration file for advanced settings.
 * For example, here you can define editor params (path, scriptname):
 *
 * Editor_Markitup::$path = 'media/markitup';
 *
 */

Editor::$language	  = strtolower(substr(I18n::$lang, 0, 2));

// set your editor profiles
// NOTE: when MarkItUp! used, you should set its size at PATH/skins/SKINNAME/style.css
return array
(
  'default'	  => array
  (
	'width'			=> 300,
	'height'		=> 1000,
  ),

  'tinymce'	  => array
  (
	'driver'		=> 'tinymce',
	'width'			=> 500,
	'height'		=> 300,
	'fieldname'		=> 'text',
/*	'params'		=> array
	(

	),*/
  ),

  'ckeditor' => array
  (
    'driver'		=> 'ckeditor',
	'width'			=> 400,
	'height'		=> 600,
	'fieldname'		=> 'text',
	'params'		=> array
	(
	  'skin'		  => 'kama',
	),
  ),
);