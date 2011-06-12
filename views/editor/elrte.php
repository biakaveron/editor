<?php defined('SYSPATH') OR die('No direct access allowed.');
$options['styleWithCSS'] = false;
unset($options['value'], $options['name']);
?>
<script type="text/javascript">
	$().ready(function() {
		// create editor
		$('[name="<?php echo $name ?>"]').elrte(<?php echo json_encode($options) ?>);

		// or this way
		// var editor = new elRTE(document.getElementById('our-element'), opts);
	});
</script>