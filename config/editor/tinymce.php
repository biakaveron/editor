<?php defined('SYSPATH') or die('No direct script access.');

$poor_buttons = array
(
		'bold', 'italic', 'underline', 'strikethrough',
);

$rich_buttons = $poor_buttons + array
(
		'|',
		'justifyleft', 'justifycenter', 'justifyright', 'justifyfull',
		'bullist', 'numlist', 'outdent', 'indent',
);


return array
(
	'forum_post'	=> array
	(
		'theme'				=> 'advanced',
	  'plugins'		  => array('emotions', 'table', 'paste', 'searchreplace'),
		'buttons1'		=> $rich_buttons,
	  'buttons2'	  => array('emotions', 'tablecontrols', 'pasteword', 'search,replace'),
	),
	
	'forum_comment'	=> array
	(
		'plugins'		=> array('emotions'),
		'buttons1'	=> array_merge($poor_buttons, array('emotions')),
		'buttons2'	=> array(),
	),

);