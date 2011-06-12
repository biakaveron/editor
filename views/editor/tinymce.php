<?php defined('SYSPATH') OR die('No direct access allowed.');
$options['elements'] = $name;
unset($options['name'], $options['value']);
$options['mode'] = 'exact';
?>
<script language="javascript" type="text/javascript">
	tinyMCE.init(
		<?php echo json_encode($options) ?>
	);
</script>